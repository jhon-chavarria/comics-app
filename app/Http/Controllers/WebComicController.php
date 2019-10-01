<?php

namespace App\Http\Controllers;
use App\Http\AppUtil;
use Illuminate\Http\Request;

class WebComicController extends Controller
{
    private $recentComicUrl = "https://xkcd.com/info.0.json";
    private $comicUrl = "https://xkcd.com/XXX/info.0.json";

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
        $comic = AppUtil::callAPI('GET', $this->recentComicUrl);

        $currentComic = [];
        
        if (isset($comic)) {
            return view('comic', ['comic' => json_decode($comic, true)]);
        }
    }

    public function getComicByNumber(Request $request)
    {
        $finalComicUrl = str_replace("XXX", $request->comicNumber, $this->comicUrl);
        $comic = AppUtil::callAPI('GET', $finalComicUrl);

        if (isset($comic)) {
            return view('comic', ['comic' => json_decode($comic, true)]);
        }
    }

    public static function getNavigation($current)
    {
        $prev = '/comic/' . ($current - 1);
        $next = '/comic/' . ($current +1);
        return view('navigation', ['prev' => $prev, 'next' => $next]);
    }
}
