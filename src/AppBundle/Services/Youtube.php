<?php

namespace AppBundle\Services;

use \GuzzleHttp\Client;

class Youtube
{
    public function getapi()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://www.googleapis.com/youtube/v3/search?part=id&channelId=UCrFx0KTUzpDQY2mkLWoIdyg&publishedAfter=2017-10-02T00%3A00%3A00Z&key=AIzaSyBR7D0zD3jh9RTiQuXrGapwSwFdmlnuT5w');
        var_dump(json_decode($res->getBody()));
    }
}
