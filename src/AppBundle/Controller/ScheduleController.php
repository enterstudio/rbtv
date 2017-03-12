<?php namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ScheduleController extends Controller
{

  public function updateScheduleAction($param)
  {
    $crawler = $this->get('app.crawler');
    $url = 'http://www.rocketbeans.tv/wochenplan/';
    $plan = $crawler->crawlSchedule($url);
  }

  /**
   * @Route("/sendeplan", name="schedule")
   */
  public function currentAction()
  {
    // Current day
    $day = new \DateTime();
    $day->setTime(0, 0, 0);

    /**
     * Get plan of today and the next 6 days.
     */
    $plan = array();
    for ($i = 0; $i < 7; ++$i) {
      $plan[] = [
          'datetime' => (clone $day),
          'timestamp' => $day->getTimestamp(),
          'schedules' => $this->getDoctrine()->getManager()->getRepository('SharedBundle:Schedule')->findByDay($day),
      ];

      // Increase day
      $day->add(new \DateInterval('P1D'));
    }

    return $this->render('app/schedule/plan.html.twig', [
            'plan' => $plan,
    ]);
  }

  /**
   * @Route("/sendeplan/woche/{week}")
   */
  public function weekAction($week)
  {
    /* TODO */
    return $this->forward('schedule');
  }
}
