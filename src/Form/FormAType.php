<?php
// src/Form/FormAType.php
// src/Form/FormAType.php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class FormAType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('vendeurs', EntityType::class, [
                'class' => 'App\Entity\Vendeur', // Remplacez 'Type' par le nom de votre entité de type
                'choice_label' => 'nomV', // Remplacez 'nom' par le nom de la propriété que vous souhaitez afficher dans la liste déroulante
                'placeholder' => 'Choisissez votre organisme de vente', // Texte à afficher par défaut dans la liste déroulante
                'attr' => [
                    'class' => 'form-control' // Ajoutez des classes CSS si nécessaire
                ]
            ])
            ->add('etat', EntityType::class, [
                'class' => 'App\Entity\Etat', // Remplacez 'Type' par le nom de votre entité de type
                'choice_label' => 'status', // Remplacez 'nom' par le nom de la propriété que vous souhaitez afficher dans la liste déroulante
                'placeholder' => 'État du bien', // Texte à afficher par défaut dans la liste déroulante
                'attr' => [
                    'class' => 'form-control' // Ajoutez des classes CSS si nécessaire
                ]
            ])
            ->add('prix', NumberType::class, [
                'html5' => true,
                'attr'=>[
                    'placeholder'=>"Prix"
                ]
            ])
            ->add('superficie', NumberType::class, [
                'attr'=>[
                    'placeholder'=>"Superficie"
                ]
            ])
            ->add('nb_piece', NumberType::class, [
                'attr'=>[
                    'placeholder'=>"Nombre de pièces"
                ]
            ])
            ->add('type', EntityType::class, [
                'class' => 'App\Entity\Type', // Remplacez 'Type' par le nom de votre entité de type
                'choice_label' => 'typeBien', // Remplacez 'nom' par le nom de la propriété que vous souhaitez afficher dans la liste déroulante
                'placeholder' => 'Choisir un type', // Texte à afficher par défaut dans la liste déroulante
                'attr' => [
                    'class' => 'form-control' // Ajoutez des classes CSS si nécessaire
                ]
            ])
            ->add('ville', TextType::class, [
                'attr' => [
                    'placeholder' => "Exemple : Poissy"
                ]
            ])
            ->add('description', TextType::class, [
                'attr' => [
                    'placeholder' => "Entrez une description"
                ]
            ])
            ->add('cp', TextType::class, [
                'attr' => [
                    'placeholder' => "Exemple : 78300"
                ]
            ])
            ->add('image', TextType::class, [
                'attr'=>[
                    'placeholder'=>"Saisir une URL d'image valide"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
