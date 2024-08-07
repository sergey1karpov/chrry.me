<?php

namespace App\Services;

use App\Api\IpApiConnection;
use App\Contracts\StatisticInterface;
use App\Models\ProductStats;
use App\Models\User;
use Illuminate\Http\Request;

class CreateProductsViewStatistics implements StatisticInterface
{
    public function __construct(private IpApiConnection $connection) {}

    /**
     * @param User $user
     * @param string $guest_ip
     * @param array|null $request
     * @return void
     */
    public function createStatistics(User $user, string $guest_ip, array $request = null): void
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
     * @param array|null $request
     * @return ProductStats|null
     */
    public function getStatisticsData(string $guest_ip, User $user, array $request = null): null|ProductStats
    {
        return ProductStats::where('guest_ip', $guest_ip)
            ->whereDate('created_at', today())
            ->where('user_id', $user->id)
            ->where('product_id', $request['product_id'])
            ->first();
    }

    /**
     * @param User $user
     * @param string $guest_ip
     * @param array $data
     * @param array|null $request
     * @return void
     */
    public function setStatisticsData(User $user, string $guest_ip, array $data, array $request = null): void
    {
        ProductStats::create([
            'user_id' => $user->id,
            'product_id' => $request['product_id'],
            'guest_ip' => $guest_ip,
            'created_at' => today(),
            'city' => $data['city'] ?? null,
            'country' => $data['country'] ?? null,
            'country_code' => $data['countryCode'] ?? null,
        ]);
    }
}
