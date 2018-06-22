<?php

namespace App\Repository;

use App\Landmarks;
use App\Service\SearchService;

class LandMarkRepository
{

    /**
     * @var Landmarks
     */
    protected $model;

    /**
     * @var SearchService
     */
    protected $service;

    /**
     * LandMarkRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Landmarks();
        $this->service = new SearchService();
    }

    /**
     * @param $array
     */
    public function saveLandMarks($array)
    {
        $this->model->create($this->service->setLandMarkData($array));
    }
}