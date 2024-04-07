<?php

namespace App\Repository;

use App\Entity\Type;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Type::class);
    }

    /**
     * Récupère les types triés par typeBien
     *
     * @return Type[] Returns an array of Type objects
     */
    public function findByTypeBien(): array
    {
        return $this->createQueryBuilder('t')
            ->orderBy('t.typeBien', 'ASC')
            ->getQuery()
            ->getResult();
    }

    //    /**
//     * @return Annonce[] Returns an array of Annonce objects
//     */
public function listeAnnoncesCompletePaginee()
{
    return $this->createQueryBuilder('ann')
        ->orderBy('ann.types', 'ASC')
        ->getQuery()
        ->getResult();
}
}

