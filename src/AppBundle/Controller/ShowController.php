<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowController extends Controller
{
    /**
     * @Route("/jetzt", name="current")
     */
    public function currentAction()
    {
        return $this->render('app/show/current.html.twig');
    }
    
    /**
     * @Route("/alert", name="watch_alert")
     */
    public function alertAction()
    {
        return $this->render('app/show/alert.html.twig');
    }

    /**
     * @Route("/shows", name="shows")
     */
    public function showsAction()
    {
        $shows = $this->getDoctrine()->getRepository('SharedBundle:Show')->findAll();

        return $this->render('app/show/shows.html.twig', ['shows' => $shows]);
    }

    /**
     * @Route("/show/{slug}", name="show")
     */
    public function showAction($slug)
    {
        $show = $this->getDoctrine()->getRepository('SharedBundle:Show')->findOneBy(['slug' => $slug]);

        if (!$show) {
            throw $this->createNotFoundException('Cannot find show for slug \''.$slug.'\'.');
        }

        return $this->render('app/show/show.html.twig', ['show' => $show]);
    }
}
