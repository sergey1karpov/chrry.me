<?php

namespace App\Services;

use App\Api\IpApiConnection;
use App\Contracts\StatisticInterface;
use App\Models\Stats;
use App\Models\User;
use Illuminate\Support\Carbon;

class CreateProfileViewStatistics implements StatisticInterface
{
    public function __construct(private IpApiConnection $connection) {}

    /**
     * @param User $user
     * @param string $guest_ip
     * @return void
     */
    public function createStatistics(User $user, string $guest_ip): void
    {
        $data = $this->connection->getDataFromAPI($guest_ip);

        $stat = $this->getStatisticsData($guest_ip, $user);

        if(null == $stat) {
            $this->setStatisticsData($user, $guest_ip, $data);
        }
    }

    /**
     * @param string $guest_ip
     * @param User $user
     * @return Stats|null
     */
    public function getStatisticsData(string $guest_ip, User $user): null|Stats
    {
        return Stats::where('guest_ip', $guest_ip)
            ->where('user_id', $user->id)
            ->whereDate('created_at', today())
            ->first();
    }

    /**
     * @param User $user
     * @param string $guest_ip
     * @param array $data
     * @return void
     */
    public function setStatisticsData(User $user, string $guest_ip, array $data): void
    {
        Stats::create([
            'user_id'      => $user->id,
            'guest_ip'     => $guest_ip,
            'created_at'   => today(),
            'city'         => $data['city'] ?? null,
            'country'      => $data['country'] ?? null,
            'country_code' => $data['country'] ?? null,
        ]);
    }
}
