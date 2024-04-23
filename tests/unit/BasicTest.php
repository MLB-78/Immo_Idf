<?php


namespace App\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EtatRepositoryTest extends KernelTestCase
{
    public function testDoublonsDansLaTableEtat()
    {
        self::bootKernel();
        $container = self::$container;

        // Récupérer le repository de l'entité Etat
        $etatRepository = $container->get('doctrine')->getRepository(\App\Entity\Etat::class);

        // Récupérer toutes les instances de l'entité Etat depuis la base de données
        $etats = $etatRepository->findAll();

        // Convertir les instances en tableau simple contenant uniquement les valeurs de la propriété status
        $statusValues = array_map(function ($etat) {
            return $etat->getStatus();
        }, $etats);

        // Compter le nombre d'occurrences de chaque valeur de statut
        $statusCounts = array_count_values($statusValues);

        // Filtrer les valeurs qui apparaissent plus d'une fois (doublons)
        $doublons = array_filter($statusCounts, function ($count) {
            return $count > 1;
        });

        // Si $doublons n'est pas vide, cela signifie qu'il y a des doublons
        $this->assertEmpty($doublons, 'Il y a des doublons dans la table Etat.');
    }
}
