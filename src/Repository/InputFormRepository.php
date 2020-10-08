<?php

namespace App\Repository;

use App\Entity\InputForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InputForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method InputForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method InputForm[]    findAll()
 * @method InputForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InputFormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InputForm::class);
    }

    // /**
    //  * @return InputForm[] Returns an array of InputForm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InputForm
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
