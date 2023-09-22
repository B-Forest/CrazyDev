<?php

namespace App\Form;

use App\Entity\Color;
use App\Entity\Pattern;
use App\Entity\Sock;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SockFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('color', EntityType::class, [
                'class' => Color::class,
                'choice_label' => 'label',
                'label' => false,
                'required' => false,
                'placeholder' => 'Couleur',
            ])
            ->add('pattern',EntityType::class, [
                'class' => Pattern::class,
                'choice_label' => 'name',
                'label' => false,
                'required' => false,
                'placeholder' => 'Motif',
            ])
        ;
    }
}
