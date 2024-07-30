<?php

namespace Tests\Feature;

use App\Api\IpApiConnection;
use App\Models\LinkStat;
use App\Models\User;
use App\Services\CreateClickLinkStatistics;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Tests\TestCase;

class CreateClickLinkStatisticsTest extends TestCase
{
//    use DatabaseTransactions;
//
//    private User $user;
//
//    private Request $request;
//
//    private IpApiConnection $connection;
//
//    public function setUp(): void
//    {
//        parent::setUp();
//
//        $this->user = User::factory()->create();
//
//        $this->request = new Request();
//        $this->request->replace(['link_id' => 1]);
//
//        $this->connection = $this->createMock(IpApiConnection::class);
//        $this->connection->expects($this->any())
//            ->method('getDataFromAPI')
//            ->with('127.0.0.1')
//            ->willReturn([
//                'city' => 'Moscow',
//                'country' => 'Russia',
//                'countryCode' => 'RU',
//            ]);
//    }
//
//    /**
//     * Add stat
//     * @return void
//     */
//    public function test_createStatistics_ok(): void
//    {
//        $createClickLinkStatistics = new CreateClickLinkStatistics($this->connection);
//        $createClickLinkStatistics->createStatistics($this->user, '127.0.0.1', $this->request);
//
//        $this->assertDatabaseHas('link_stat', [
//            'user_id' => $this->user->id,
//            'link_id' => 1,
//            'city' => 'Moscow',
//            'country' => 'Russia',
//            'country_code' => 'RU'
//        ]);
//    }
//
//    /**
//     * Stat doesn't add
//     * @return void
//     */
//    public function test_createStatistics_false(): void
//    {
////        $this->withoutExceptionHandling();
//
//        LinkStat::create([
//            'user_id' => $this->user->id,
//            'link_id' => 1,
//            'city' => 'Moscow',
//            'country' => 'Russia',
//            'country_code' => 'RU',
//            'guest_ip' => '127.0.0.1',
//            'created_at' => today(),
//        ]);
//
//        $createClickLinkStatistics = new CreateClickLinkStatistics($this->connection);
//        $createClickLinkStatistics->createStatistics($this->user, '127.0.0.1', $this->request);
//
//        $rows = LinkStat::where('user_id', $this->user->id)->get();
//
//        $this->assertSame(count($rows), 1);
//    }
}






























