<?php

namespace App\Service;

class FlickrService
{

    /**
     *  Method used to query flickr api
     *
     * @param $lat
     * @param $long
     * @return mixed
     */
    public function search($lat, $long)
    {
        $params = array(
            'api_key'	=> '27c2218da3d9fe0e642c84543504eaca',
            'method'	=> 'flickr.photos.search',
            'lat' => $lat,
            'lon' => $long,
            'content_type' => 1,
            'per_page' => 10,
            'format' => 'php_serial',
        );

        $encoded_params = array();

        foreach ($params as $k => $v){

            $encoded_params[] = urlencode($k).'='.urlencode($v);
        }

        $url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);
        $rsp = file_get_contents($url);
        $rsp_obj = unserialize($rsp);
        return $rsp_obj;
    }
}