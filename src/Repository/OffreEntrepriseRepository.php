<?php

namespace App\Repository;

use App\Entity\OffreEntreprise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OffreEntreprise>
 *
 * @method OffreEntreprise|null find($id, $lockMode = null, $lockVersion = null)
 * @method OffreEntreprise|null findOneBy(array $criteria, array $orderBy = null)
 * @method OffreEntreprise[]    findAll()
 * @method OffreEntreprise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreEntrepriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OffreEntreprise::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(OffreEntreprise $entity, bool $flush = false): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(OffreEntreprise $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

//    /**
//     * @return OffreEntreprise[] Returns an array of OffreEntreprise objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OffreEntreprise
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
