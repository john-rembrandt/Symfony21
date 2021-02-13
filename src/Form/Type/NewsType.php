<?php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('auteur', TextType::class)
            ->add('titre', TextType::class)
            ->add('contenu', TextType::class)
            ->add('dateAjout', DateType::class)
            ->add('dateModif', DateType::class)
            ->add('soumettre', SubmitType::class)
        ;
    }
}