<?php

namespace App\Repository;

use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function findOneById($id)
    {
        return $this->createQueryBuilder('o')
            ->select('o.id, o.paid, o.createdAt', 'p.firstName, p.lastName, p.email', 'c.currency', 'k.name AS kitname', 'ck.price')
            ->leftJoin('App\Entity\Kit', 'k', 'WITH',  'k.id = o.kit'  )  //kit
            ->leftJoin('App\Entity\CountryKit', 'ck', 'WITH', 'ck.kit = k.id and o.country = ck.country')
            ->leftJoin('App\Entity\Country', 'c', 'WITH', 'ck.country=c.id')
            ->leftJoin('App\Entity\Patient', 'p', 'WITH', 'o.patient=p.id')

            ->andWhere('o.id = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * override findAll
     */
    public function findAll()
    {
        return $this->createQueryBuilder('o')
            ->select('o.id, o.paid, o.createdAt', 'p.firstName, p.lastName, p.email', 'c.currency', 'k.name AS kitname', 'ck.price')
            ->leftJoin('App\Entity\Kit', 'k', 'WITH',  'k.id = o.kit'  )  //kit
            ->leftJoin('App\Entity\CountryKit', 'ck', 'WITH', 'ck.kit = k.id and o.country = ck.country')
            ->leftJoin('App\Entity\Country', 'c', 'WITH', 'ck.country=c.id')
            ->leftJoin('App\Entity\Patient', 'p', 'WITH', 'o.patient=p.id')
            ->orderBy('o.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Order[] Returns an array of Order objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Order
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


}
