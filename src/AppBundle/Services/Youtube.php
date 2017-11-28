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

    public function getNew()
    {
        $date = date('Y-m-d');
        $time = date('H:i:s', strtotime('-2 hour'));
        $fulldate = $date.'T'.$time.'Z';
        $client = new Client();
        $res = $client->request('GET', 'https://www.googleapis.com/youtube/v3/search', [
            'query' => [
                'part'           => 'id',
                'channelId'      => 'UCrFx0KTUzpDQY2mkLWoIdyg',
                'publishedAfter' => $fulldate,
                'key'            => 'AIzaSyBR7D0zD3jh9RTiQuXrGapwSwFdmlnuT5w'
            ]
        ]);
        $body = json_decode($res->getBody());
        foreach ($body->items as $item) {
            $result = $this->videoRepository->findOneByVideoid($item->id->videoId);
            if ($result == NULL) {
                $videos = new Videos();
                $videos->setDate(new \DateTime("now"));
                $videos->setVideoid($item->id->videoId);
                $this->em->persist($videos);
                $this->em->flush();
            }
        }
    }
}
