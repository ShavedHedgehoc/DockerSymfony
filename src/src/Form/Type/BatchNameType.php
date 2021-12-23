<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

use Symfony\Component\Form\FormBuilderInterface;

class BatchNameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $optins): void
    {
        $builder
        ->add('batchname', TextType::class)
        ->add('send', SubmitType::class,['label'=>'Send'])        
        ;
    }
}