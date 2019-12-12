<?php

// src/Admin/EventTypeAdmin.php

namespace Owp\OwpMap\Admin;

use Owp\OwpCore\Admin\AbstractEntityAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class MapAdmin extends AbstractEntityAdmin
{
    protected $baseRoutePattern  = 'map';
}
