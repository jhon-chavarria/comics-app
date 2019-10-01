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
        $get_data = AppUtil::callAPI('GET', $this->recentComicUrl);
    }
}
