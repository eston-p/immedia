<?php

namespace App\Jobs;

use App\Photos;
use App\Service\FlickrService;
use App\Service\SearchService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class FlickrJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var
     */
    protected $landmark;

    /**
     * Create a new job instance.
     *
     * @param array $landmark
     * @return void
     */
    public function __construct($landmark)
    {
        $this->landmark = $landmark;
    }


    /**
     * Execute the job
     *
     * @param FlickrService $flickrService
     * @param Photos $photos
     * @param SearchService $service
     */
    public function handle(FlickrService $flickrService, Photos $photos, SearchService $service)
    {

        $images = $flickrService->search($this->landmark['lat'], $this->landmark['long']);
        foreach ($images['photos']['photo'] as $key => $value) {
            $value['search_place'] = $this->landmark['search_place'];
            $value['search_term'] = $this->landmark['search_term'];
            $photos->create($service->setPhotosData($value));
        }
    }
}
