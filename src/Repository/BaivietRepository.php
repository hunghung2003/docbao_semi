<?php

namespace App\Repository;

use App\Entity\Baiviet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Baiviet>
 *
 * @method Baiviet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Baiviet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Baiviet[]    findAll()
 * @method Baiviet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BaivietRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Baiviet::class);
    }

    public function save(Baiviet $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Baiviet $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}