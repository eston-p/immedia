<?php

namespace App\Http\Controllers;

use App\Listings;
use App\Photos;
use App\Repository\LandMarkRepository;
use App\Service\FourSquare;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * @var LandMarkRepository
     */
    public $repository;

    /**
     * @var Photos
     */
    protected $photos;

    /**
     * SearchController constructor.
     */
    public function __construct()
    {
        $this->repository = new LandMarkRepository();
        $this->photos = new Photos();
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $place
     * @param string $param
     * @return \Illuminate\Http\Response
     */
    public function index(string  $place, string $param)
    {
        sleep(10);
       $photos =  $this->photos::where('search_place', $place)->where('search_term', $param)->paginate(10);
       return view('view', ['photos' => $photos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FourSquare $fourSquare)
    {
        $place = $request->input('place');
        $param = $request->input('param');
        $results = $fourSquare->query($place, $param);

        $listing = new Listings();

        $query = $listing->where('name', $place)->first();

        if (is_null($query)) {
            $listing->create([
                'name' => $place,
                'search' => $param,
            ]);

            foreach ($results['response']['venues'] as $key => $value) {
                $value['place'] = $place;
                $value['param'] = $param;
                $this->repository->saveLandMarks($value);
            }
        }

        return redirect()->route('view', ['place' => $place, 'param' => $param]);

    }

    public function showListing()
    {
        $listing = new Listings();
        return view('welcome', ['listings' => $listing->all()]);
    }
}
