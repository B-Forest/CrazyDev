<?php

namespace App\Repository;

use App\Entity\Sock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<Sock>
* @implements PasswordUpgraderInterface<Sock>
 *
 * @method Sock|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sock|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sock[]    findAll()
 * @method Sock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SockRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sock::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof Sock) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    public function findLonelySocks (): array
    {
        $qb = $this->createQueryBuilder('sock');

        $qb->addSelect('sock')
            ->andWhere('sock.isFound = 0')
            ->orderBy('sock.id', 'ASC');

        return $qb->getQuery()->getResult();
    }

    public function findByFilter($data): array
    {
    $qb = $this->createQueryBuilder('sock');

        $qb->addSelect('sock')
            ->andWhere('sock.isFound = 0')
            ->orderBy('sock.id', 'ASC');

    if ($data['color']) {
        $qb->andWhere('sock.color = :color')
            ->setParameter('color', $data['color']);
    }

    if ($data['pattern']) {
        $qb->andWhere('sock.pattern = :pattern')
            ->setParameter('pattern', $data['pattern']);
    }

    $qb->orderBy('sock.id', 'ASC');

    return $qb->getQuery()->getResult();
    }
//    /**
//     * @return Sock[] Returns an array of Sock objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Sock
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
