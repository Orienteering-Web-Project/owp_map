<?php

namespace Owp\OwpMap\Entity;

use Doctrine\ORM\Mapping as ORM;
use Owp\OwpCore\Model as OwpCoreTrait;

/**
 * @ORM\Entity(repositoryClass="Owp\OwpMap\Repository\MapRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Map
{
    use OwpCoreTrait\IdTrait;
    use OwpCoreTrait\TitleTrait;
    use OwpCoreTrait\ContentTrait;
    use OwpCoreTrait\AuthorTrait;
    use OwpCoreTrait\PrivateTrait;
}
