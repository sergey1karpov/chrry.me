<?php

namespace Tests\Feature;

use App\Api\IpApiConnection;
use App\Models\Stats;
use App\Models\User;
use App\Services\CreateProfileViewStatistics;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProfileViewStatisticsTest extends TestCase
{
    use DatabaseTransactions;

    private User $user;

    private IpApiConnection $connection;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->connection = $this->createMock(IpApiConnection::class);
        $this->connection->expects($this->any())
            ->method('getDataFromAPI')
            ->with('127.0.0.1')
            ->willReturn([
                'city' => 'Moscow',
                'country' => 'Russia',
                'countryCode' => 'RU',
            ]);
    }

    public function test_createStatistics_ok()
    {
        $service = new CreateProfileViewStatistics($this->connection);
        $service->createStatistics($this->user, '127.0.0.1');

        $this->assertDatabaseHas('stats', [
            'user_id' => $this->user->id,
            'guest_ip' => '127.0.0.1',
            'city' => 'Moscow',
            'country' => 'Russia',
            'country_code' => 'RU',
        ]);
    }

    public function test_createStatistics_false()
    {
        Stats::create([
            'user_id' => $this->user->id,
            'guest_ip' => '127.0.0.1',
            'city' => 'Moscow',
            'country_code' => 'RU',
            'country' => 'Russia',
        ]);

        $service = new CreateProfileViewStatistics($this->connection);
        $service->createStatistics($this->user, '127.0.0.1');

        $rows = Stats::where('user_id', $this->user->id)->get();
        $this->assertSame(count($rows), 1);
    }

}
