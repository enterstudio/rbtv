<?php

namespace SharedBundle\DataFixtures\ORM;

use SharedBundle\Entity\Episode;
use SharedBundle\Entity\Schedule;
use SharedBundle\Entity\Show;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTestData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $this->persistShows($manager);
        $this->persistPartners($manager);
        $manager->flush();
    }

    protected function persistShows(ObjectManager $manager)
    {
        for ($i = 0; $i < 7; ++$i) {
            $show = new Show();
            $show->setName('Test '.$i);
            $show->setSlug('test-'.$i);
            $show->setDescription('Bla Bla Bla. '.$i);
            $show->setSince(new \DateTime('2014-12-31 00:11:22'));

            for ($j = 0; $j < 3; ++$j) {
                $episode = new Episode();
                $episode->setName('Episode X'.$i.$j);
                $episode->setSlug('episode-x'.$i.$j);
                $episode->setDescription('Description Bla Bla X'.$i.$j);
                $episode->setShow($show);
                $show->addEpisode($episode);

                for ($k = 0; $k < 2; ++$k) {
                    $start_dt = new \DateTime();
                    $start_dt->add(new \DateInterval('P'.$j.'DT'.$k.'H'));

                    $end_dt = (clone $start_dt);
                    $end_dt->add(new \DateInterval('PT2H'));

                    $schedule = new Schedule();
                    $schedule->setStart($start_dt);
                    $schedule->setEnd($end_dt);
                    $schedule->setEpisode($episode);
                    $episode->addSchedule($schedule);

                    $manager->persist($schedule);
                }

                $manager->persist($episode);
            }

            $manager->persist($show);
        }
    }

    protected function persistPartners(ObjectManager $manager)
    {
        // $partner = new Partner();
    // $manager->persist($partner);
    }
}
