<?php

namespace App\Contracts;

use App\Interfaces\Statistic;
use App\Models\User;

interface StatisticInterface
{
    public function createStatistics(User $user, string $guest_ip): void;

    public function getStatisticsData(string $guest_ip, User $user): null|Statistic;

    public function setStatisticsData(User $user, string $guest_ip, array $data): void;
}
