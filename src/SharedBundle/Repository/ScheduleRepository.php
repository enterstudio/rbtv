<?php

namespace SharedBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ScheduleRepository extends EntityRepository
{
    public function findByDay(\DateTime $day = null)
    {
        if ($day === null) {
            $day = new \DateTime();
        }

        return $this->getEntityManager()->createQueryBuilder()
        ->select('schedule')
        ->from('SharedBundle:Schedule', 'schedule')
        ->where('schedule.start BETWEEN :day and :end')
        ->setParameter('day', $day->format('Y-m-d').' 00:00:00')
        ->setParameter('end', $day->format('Y-m-d').' 23:59:59')
        ->getQuery()->getResult();
    }
}
