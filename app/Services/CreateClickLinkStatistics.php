<?php

namespace App\Services;

use App\Api\IpApiConnection;
use App\Contracts\StatisticInterface;
use App\Models\LinkStat;
use App\Models\User;
use Illuminate\Http\Request;

class CreateClickLinkStatistics implements StatisticInterface
{
    public function __construct(private readonly IpApiConnection $connection) {}

    /**
     * @param User $user
     * @param string $guest_ip
     * @param Request|null $request
     * @return void
     */
    public function createStatistics(User $user, string $guest_ip, Request $request = null): void
    {
        $data = $this->connection->getDataFromAPI($guest_ip);

        $stat = $this->getStatisticsData($guest_ip, $user, $request);

        if(null == $stat) {
            $this->setStatisticsData($user, $guest_ip, $data, $request);
        }
    }

    /**
     * @param string $guest_ip
     * @param User $user
     * @param Request|null $request
     * @return LinkStat|null
     */
    public function getStatisticsData(string $guest_ip, User $user, Request $request = null): null|LinkStat
    {
        return LinkStat::where('guest_ip', $guest_ip)
            ->where('created_at', today())
            ->where('user_id', $user->id)
            ->where('link_id', $request->link_id)
            ->first();
    }

    /**
     * @param User $user
     * @param string $guest_ip
     * @param array $data
     * @param Request|null $request
     * @return void
     */
    public function setStatisticsData(User $user, string $guest_ip, array $data, Request $request = null): void
    {
        LinkStat::create([
            'user_id' => $user->id,
            'link_id' => $request->link_id,
            'guest_ip' => $guest_ip,
            'created_at' => today(),
            'city' => $data['city'] ?? null,
            'country' => $data['country'] ?? null,
            'country_code' => $data['countryCode'] ?? null,
        ]);
    }
}
