<?php

namespace App\Repository;

use App\Entity\Docente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Docente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Docente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Docente[]    findAll()
 * @method Docente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocenteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Docente::class);
    }

//    /**
//     * @return Docente[] Returns an array of Docente objects
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
    public function findOneBySomeField($value): ?Docente
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
