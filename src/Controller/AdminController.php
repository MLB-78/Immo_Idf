<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\FormAType;
use App\Form\AnnonceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{

    /**
     * @Route("/admin", name="adminA")
     */
    public function ajoutAnnonces(Request $request, EntityManagerInterface $manager): Response
    {
        // Fetch the annonces from the database
        $lesAnnonces = $manager->getRepository(Annonce::class)->findAll();

        // Create a new Annonce instance for the form
        $annonce = new Annonce();

        $form = $this->createForm(FormAType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($annonce);
            $manager->flush();

            // Ajoutez le message flash spécifique pour l'ajout
            $this->addFlash("success", "L'annonce a été ajoutée avec succès");

            return $this->redirectToRoute('adminA');
        }

        return $this->render('admin/annonce.html.twig', [
            'formAnnonce' => $form->createView(),
            'lesAnnonces' => $lesAnnonces,
        ]);
    }
    
    /**
     * @Route("/admin/annonce/modification/{id}", name="admin_annonces_modification", methods={"GET","POST"})
     */
    public function modificationAnnonce(Request $request, Annonce $annonce, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(FormAType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->flush();

            // Ajoutez le message flash spécifique pour la modification
            $this->addFlash("success", "L'annonce a été modifiée avec succès");

            return $this->redirectToRoute('adminA');
        }

        return $this->render('admin/modification.html.twig', [
            'formAnnonce' => $form->createView(),
        ]);
    }

   /**
     * @Route("/annonce/suppression/{id}", name="admin_annonces_suppression", methods={"DELETE", "POST"})
     */
    public function suppressionAnnonce(Request $request, Annonce $annonce): Response
    {
        if ($this->isCsrfTokenValid('delete'.$annonce->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($annonce);
            $entityManager->flush();

            // Ajoutez le message flash spécifique pour la suppression
            $this->addFlash("success", "L'annonce a été supprimée avec succès");
        } else {
            $this->addFlash("error", "Échec de suppression de l'annonce");
        }

        return $this->redirectToRoute('adminA');
    }
}
