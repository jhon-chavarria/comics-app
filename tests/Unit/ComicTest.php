<?php

namespace Tests\Unit;

use Tests\TestCase;

class ComicTest extends TestCase
{
    public function testGetRecentComic()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "https://xkcd.com/info.0.json");
      
        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getBody(true), true);
        $this->assertArrayHasKey('num', $data);
        $this->assertArrayHasKey('alt', $data);
    }

    public function testAnyComicNumber()
    {   
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "https://xkcd.com/250/info.0.json");
      
        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getBody(true), true);
        $this->assertArrayHasKey('num', $data);
        $this->assertArrayHasKey('alt', $data);
    }
}
