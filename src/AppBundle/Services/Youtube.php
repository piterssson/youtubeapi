<?php

namespace AppBundle\Services;

use \GuzzleHttp\Client;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Videos;

class Youtube
{
    private $videoRepository;
    private $em;

    public function __construct($videoRepository, EntityManager $em)
    {
        $this->videoRepository = $videoRepository;
        $this->em = $em;
    }

    public function getapi()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://www.googleapis.com/youtube/v3/search?part=id&channelId=UCrFx0KTUzpDQY2mkLWoIdyg&publishedAfter=2017-10-02T00%3A00%3A00Z&key=AIzaSyBR7D0zD3jh9RTiQuXrGapwSwFdmlnuT5w');
        $body = json_decode($res->getBody());
        foreach ($body->items as $item) {
            $result = $this->videoRepository->findOneByVideoid($item->id->videoId);
            if ($result == NULL) {
                $videos = new Videos();
                echo 'null<br>';
            }
        }
    }
}
