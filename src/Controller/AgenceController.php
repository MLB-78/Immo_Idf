<?php

// AgenceController.php

namespace App\Controller;

use App\Repository\VendeurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AgenceController extends AbstractController
{
    /**
     * @Route("/agences", name="agences", methods={"GET"})
     */
    public function listeAgences(VendeurRepository $vendeurRepository, Request $request): Response
    {
        // Get the search query from the request
        $query = $request->query->get('query');

        // If a search query exists, perform the search
        if ($query) {
            $vendeurs = $vendeurRepository->searchVendeur($query);
        } else {
            // Otherwise, fetch all sellers
            $vendeurs = $vendeurRepository->findAll();
        }

        // Pass the list of sellers to the template
        return $this->render('agence/listeAgence.html.twig', [
            'lesAgences' => $vendeurs
        ]);
    }
}
