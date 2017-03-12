<?php namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/spiele")
 */
class GameController extends Controller
{

  /**
   * @Route("/mateknights", name="mateknights")
   */
  public function mateknightsAction()
  {
    return $this->render('app/games/mateknights.html.twig');
  }

  /**
   * @Route("/ziegenproblem", name="ziegenproblem")
   */
  public function ziegenproblemAction()
  {
    return $this->render('app/games/ziegenproblem.html.twig');
  }

  /**
   * @Route("/bohnenquiz", name="bohnenquiz")
   */
  public function bohnenquizAction()
  {
    return $this->render('app/games/bohnenquiz.html.twig');
  }

  /**
   * @Route("/bohnenraten", name="bohnenraten")
   */
  public function bohnenratenAction()
  {
    return $this->render('app/games/bohnenraten.html.twig');
  }

  /**
   * @Route("/quizduell", name="quizduell")
   */
  public function quizduellAction()
  {
    return $this->render('app/games/quizduell.html.twig');
  }

  /**
   * @Route("/votings", name="votings")
   */
  public function votingsAction()
  {
    return $this->render('app/games/votings.html.twig');
  }
}
