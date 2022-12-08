<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\CreateProfileViewStatistics;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProfileViewJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public User $user;

    public string $guest_ip;

    public CreateProfileViewStatistics $statistics;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, string $guest_ip, CreateProfileViewStatistics $statistics)
    {
        $this->user = $user;
        $this->guest_ip = $guest_ip;
        $this->statistics = $statistics;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->statistics->createStatistics($this->user, $this->guest_ip);
    }
}
