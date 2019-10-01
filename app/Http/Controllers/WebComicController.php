<?php

namespace App\Http\Controllers;
use App\Http\AppUtil;
use Illuminate\Http\Request;

class WebComicController extends Controller
{
    private $recentComicUrl = "https://xkcd.com/info.0.json";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $comics = AppUtil::callAPI('GET', $this->recentComicUrl);
        $data = [];
        
        if (isset($comics)) {
            $data = json_decode($comics, true);
        }

        return view('comic', ['comics' => $data]);
    }
}
