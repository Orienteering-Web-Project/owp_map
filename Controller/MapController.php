<?php

namespace Owp\OwpMap\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Owp\OwpMap\Service\MapService;

class MapController extends Controller
{
    public function list(MapService $mapService): Response
    {
        return $this->render('@OwpMap/List/list.html.twig', [
            'maps' => $mapService->getAll(),
        ]);
    }

    public function show(Request $request, string $slug, MapService $mapService): Response
    {
        $event = $mapService->get($slug);

        return NULL;
    }
}
