<?php

namespace App\Console\Commands;

use App\Services\UploadPhotoService;
use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class DropEvents extends Command
{
    private UploadPhotoService $uploadService;

    public function __construct(UploadPhotoService $uploadService)
    {
        $this->uploadService = $uploadService;
        parent::__construct();
    }

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
        $events = Event::where('date', '<', Carbon::tomorrow())->get();

        foreach ($events as $event) {
            $this->uploadService->deletePhotoFromFolder(str_replace('../', '', $event->banner));

            $event->delete();
        }
    }
}

