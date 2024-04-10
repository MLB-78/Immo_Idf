<?php


namespace App\Repository;

use App\Entity\Vendeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vendeur>
 *
 * @method Vendeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vendeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vendeur[]    findAll()
 * @method Vendeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VendeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vendeur::class);
    }

    // Define a method to search for sellers based on a query
    public function searchVendeur($query): array
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.nomV LIKE :query')
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('v.nomV', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
