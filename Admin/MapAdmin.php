<?php

// src/Admin/EventTypeAdmin.php

namespace Owp\OwpMap\Admin;

use Owp\OwpCore\Admin\AbstractNodeAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Route\RouteCollection;

final class MapAdmin extends AbstractNodeAdmin
{
    protected $baseRoutePattern  = 'map';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Informations générales', ['class' => 'text-bold col-12 col-lg-9'])
                ->add(self::LABEL, TextType::class)
                ->add('content', CKEditorType::class, ['config_name' => 'default', 'required' => false])
                ->add('private', CheckboxType::class, [
                    'required' => false,
                    'label' => 'Rendre cette carte privé, visible uniquement par les licenciés du club'
                ])
            ->end()
        ;

        parent::configureFormFields($formMapper);
    }
}
