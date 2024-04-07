<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;
use App\Form\FormAType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class formController extends AbstractController
{
    /**
     * @Route("/admin/form", name="app_admin_form")
     */
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        // Fetch the annonces from the database
        $lesAnnonces = $manager->getRepository(Annonce::class)->findAll();

        // Check if an ID is provided in the request (for modification)
        $annonceId = $request->get('id');
        if ($annonceId) {
            // If an ID is provided, load the existing annonce for modification
            $annonce = $manager->getRepository(Annonce::class)->find($annonceId);
        } else {
            // If no ID is provided, create a new Annonce instance for the form (for addition)
            $annonce = new Annonce();
        }

        $form = $this->createForm(FormAType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($annonce);
            $manager->flush();
            $this->addFlash("success", "L'annonce a été ajoutée/modifiée avec succès");
            return $this->redirectToRoute('app_admin_form');
        }

        return $this->render('admin/formAnnonce.html.twig', [
            'controller_name' => 'formController',
            'formAnnonce' => $form->createView(),
            'route' => $request->attributes->get('_route'), // Ajoutez cette ligne pour passer la route au template
        ]);
    }
}
