<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\CreateProductsViewStatistics;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProductViewJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public User $user;

    public string $guest_ip;

    public array $request;

    public CreateProductsViewStatistics $productStatistics;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, string $guest_ip, array $request, CreateProductsViewStatistics $productStatistics)
    {
        $this->user = $user;
        $this->guest_ip = $guest_ip;
        $this->request = $request;
        $this->productStatistics = $productStatistics;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->productStatistics->createStatistics($this->user, $this->guest_ip, $this->request);
    }
}
