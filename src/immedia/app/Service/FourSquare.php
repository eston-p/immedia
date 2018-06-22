<?php

namespace App\Service;

use GuzzleHttp\Client;

class FourSquare
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * FourSquare constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $place
     * @param string $param
     * @return mixed
     */
    public function query(string $place, string $param)
    {
        return $this->requestDataFromEnpoint(
            'https://api.foursquare.com/v2/venues/search',
            [
                'query' => [
                    'client_id' => env('FOUR_SQUARE_CLIENT'),
                    'client_secret' => env('FOUR_SQUARE_SECRET'),
                    'v' => '20180323',
                    'near' => $place,
                    'query' => $param,
                ]
            ]

        );
    }

    /**
     * @param string $uri
     * @param array $parameters
     * @return mixed
     */
    public function requestDataFromEnpoint(string $uri, array $parameters)
    {
        $request = $this->client->get($uri, $parameters);
        $data = json_decode((string) $request->getBody(), true);

        return $data;
    }
}
