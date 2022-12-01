<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class DropEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'drop:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop old events';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Event::where('date', '<', Carbon::tomorrow())->delete();
    }
}
