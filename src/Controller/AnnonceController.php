<?php

namespace App\Controller;

use App\Entity\Type;
use App\Repository\AnnonceRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonces", name="annonces")
     */
    public function index(Request $request, AnnonceRepository $annonceRepository, PaginatorInterface $paginator): Response
    {
        // Récupérez tous les types de bien disponibles
        $types = $this->getDoctrine()->getRepository(Type::class)->findAll();
        
        // Récupérez le type de bien sélectionné depuis la requête
        $choix = $request->query->get('choix2');

        // Récupérez toutes les annonces par défaut
$queryBuilder = $annonceRepository->createQueryBuilder('a');

// Vérifiez si un choix a été fait dans le formulaire
if ($choix) {
    // Ajouter la condition de filtrage
    $queryBuilder->andWhere('a.type = :type')
                 ->setParameter('type', $choix);
}

// Récupérer la requête
$query = $queryBuilder->getQuery();


        // Paginer les résultats
        $annonces = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1), // Numéro de page
            10 // Nombre d'éléments par page
        );

        // Passez les types de bien et les annonces paginées à la vue
        return $this->render('biens/listeBiens.html.twig', [
            'lesAnnonces' => $annonces,
            'types' => $types,
        ]);
    }
}
