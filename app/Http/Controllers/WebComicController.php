<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class WebComicController extends Controller
{
    private static $recentComicUrl = "https://xkcd.com/info.0.json";
    private static $comicUrl = "https://xkcd.com/XXX/info.0.json";

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
    public static function index(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('GET', self::$recentComicUrl);
            if (isset($response) && $response->getStatusCode() == 200) {
                return view('comic', ['comic' => json_decode($response->getBody(), true)]);
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            abort($e->getResponse()->getStatusCode());
        }
    }

    public function getComicByNumber(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $finalComicUrl = str_replace("XXX", $request->comicNumber, self::$comicUrl);
            $response = $client->request('GET', $finalComicUrl);
            if (isset($response) && $response->getStatusCode() == 200) {
                return view('comic', ['comic' => json_decode($response->getBody(), true)]);
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            abort($e->getResponse()->getStatusCode());
        }
    }

    public static function getNavigation($page)
    {
        $prev = self::getPrevAction($page);
        $next = self::getNextAction($page);

        return view('navigation', ['prev' => $prev, 'next' => $next]);
    }

    private static function getCurrentComic()
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('GET', self::$recentComicUrl);
            if (isset($response) && $response->getStatusCode() == 200) {
                return json_decode($response->getBody(), true);
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return '';

        }
    }

    /**
     * Prev Link Action
     */
    private static function getPrevAction($page)
    {
        if ($page == 1) {
            //$prev = '/comic/' . ($page - 1);
            return '';
        }
        return $prev = '/comic/' . ($page - 1);
    }

    /**
     * Next Link Action
     */
    private static function getNextAction($page)
    {
        $currentComic = self::getCurrentComic();
       
        if ($currentComic['num'] === $page) {
            return '';
        }

        return '/comic/' . ($page + 1);
    }

    private static function recursiveSearchAction($page)
    {

    }
}
