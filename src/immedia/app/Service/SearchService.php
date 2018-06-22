<?php

namespace App\Service;


class SearchService
{

    /**
     * Sets data to be saved for LandMark model
     *
     * @param $data
     * @return array
     */
    public function setLandMarkData($data) : array
    {
        return [
            'four_square_id' => $data['id'],
            'name' => $data['name'],
            'lat' => $data['location']['lat'],
            'long' => $data['location']['lng'],
            'search_place' => $data['place'],
            'search_term' => $data['param'],
        ];
    }

    /**
     * Sets data to be saved by Photos model
     *
     * @param $data
     * @return array
     */
    public function setPhotosData($data) : array
    {
        return [
            'photo_id' => $data['id'],
            'owner' => $data['owner'],
            'title' => $data['title'],
            'farm' => $data['farm'],
            'secret' => $data['secret'],
            'server' => $data['server'],
            'search_place' => $data['search_place'],
            'search_term' => $data['search_term'],
        ];
    }
}