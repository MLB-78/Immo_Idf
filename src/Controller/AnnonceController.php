<?php
// src/Controller/AnnonceController.php

namespace App\Controller;

use App\Entity\Type;
use App\Repository\TypeRepository; 
use App\Repository\AnnonceRepository;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonces", name="annonces")
     */
    public function index(Request $request, AnnonceRepository $annonceRepository): Response
    {
        // Récupérez tous les types de bien disponibles
        $types = $this->getDoctrine()->getRepository(Type::class)->findAll();
        // Récupérez le type de bien sélectionné depuis la requête
        $choix = $request->query->get('choix2');

        // Récupérez toutes les annonces par défaut
        $annonces = $annonceRepository->findAll();

        // Vérifiez si un choix a été fait dans le formulaire
        if ($choix) {
            // Récupérez les annonces filtrées par le choix de type de bien
            $annonces = $annonceRepository->findBy(['type' => $choix], ['id' => 'ASC']);
        }
        

        // Passez les types de bien et les annonces filtrées à la vue
        return $this->render('biens/listeBiens.html.twig', [
            'lesAnnonces' => $annonces,
            'types' => $types,
        ]);
      
    }
}

