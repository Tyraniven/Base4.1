<?php

namespace App\Repository;

use App\Entity\DetalleClase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DetalleClase|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetalleClase|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetalleClase[]    findAll()
 * @method DetalleClase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetalleClaseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DetalleClase::class);
    }

//    /**
//     * @return DetalleClase[] Returns an array of DetalleClase objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DetalleClase
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
