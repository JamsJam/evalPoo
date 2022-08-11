<?php

namespace App\Form;

use App\Entity\Game;
use App\Entity\Player;
use App\Entity\Contest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('start_date')

            
            ->add('game',EntityType::class,[
                'class' => Game::class,
                'choice_label' => "title",
                
                'mapped' => false
            ])
            // ->add('winner',EntityType::class,[
            //     'class' => Player::class,
            //     'choice_label' => 'nickname',
            //     'mapped' => false
            // ])
            ->add('player',EntityType::class,[
                'class' => Player::class,
                'choice_label' => 'nickname',
                'mapped' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contest::class,
        ]);
    }
}
