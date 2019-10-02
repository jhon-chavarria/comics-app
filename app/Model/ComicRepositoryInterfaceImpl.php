<?php

namespace App\Model;

use App\Model\ComicRepositoryInterface;

class ComicRepositoryInterfaceImpl implements ComicRepositoryInterface
{
    private static $recentComicUrl = "https://xkcd.com/info.0.json";
    private static $comicUrl = "https://xkcd.com/XXX/info.0.json";

    public function getRecentComic()
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

    public function getComicByNumber($number)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $finalComicUrl = str_replace("XXX", $number, self::$comicUrl);
            $response = $client->request('GET', $finalComicUrl);
            if (isset($response) && $response->getStatusCode() == 200) {
                return json_decode($response->getBody(), true);
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return '';
        }
    }
}
