<?php
/**
 * Description of CronTask
 *
 * @author huskynarr
 */
namespace SharedBundle\Controller;

use SharedBundle\Entity\CronTask;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/crontasks")
 */
class CronTaskController extends Controller
{

  /**
   * @Route("/cron_task_schedule", name="cron_task_schedule")
   */
  public function updateSchedule()
  {

    $entity = new CronTask();

    $entity
        ->setName('Example asset symlinking task')
        ->setInterval(3600) // Run once every hour
        ->setCommands(array(
            'assets:install --symlink web'
    ));

    $em = $this->getDoctrine()->getManager();
    $em->persist($entity);
    $em->flush();

    return new Response('OK!');
  }
}
