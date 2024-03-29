<?php

namespace Owp\OwpMap\Repository;

use Owp\OwpMap\Entity\Map;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class MapRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Map::class);
    }
}
