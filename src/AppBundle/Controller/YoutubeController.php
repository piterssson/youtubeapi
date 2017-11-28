<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class YoutubeController extends Controller
{
    public function indexAction(Request $request)
    {
        $service = $this->get('youtube.service')->getNew();

        return new Response(
            'ok'
        );
    }
}
