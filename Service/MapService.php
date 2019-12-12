<?php

namespace Owp\OwpMap\Service;

use Owp\OwpCore\Entity\Event;
use Symfony\Component\HttpFoundation\Request;
use Owp\OwpMap\Repository\MapRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Security;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Twig\Environment;
use Knp\Snappy\Pdf;

class MapService {

    private $mapRepository;
    private $session;
    private $security;
    private $twig;

    public function __construct(MapRepository $mapRepository, SessionInterface $session, Security $security, Environment $twig)
    {
        $this->mapRepository = $mapRepository;
        $this->session = $session;
        $this->security = $security;
        $this->twig = $twig;
    }

    public function getAll()
    {
        if (!$this->security->isGranted('ROLE_MEMBER')) {
            $filters[] = [
                'name' => 'private',
                'operator' => '=',
                'value' => false
            ];
        }

        return $this->mapRepository->findAll();
    }

    public function get(string $slug)
    {
        $entity = $this->mapRepository->findOneBySlug($slug);

        if (empty($entity)) {
            throw new NotFoundHttpException();
        }
        elseif (!$this->security->isGranted('view', $entity)) {
            throw new AccessDeniedException();
        }

        return $entity;
    }
}
