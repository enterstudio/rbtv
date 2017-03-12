<?php namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{

  /**
   * @Route("/", name="home")
   */
  public function indexAction()
  {
    return $this->render('app/main/index.html.twig');
  }

  /**
   * @Route("/impressum", name="imprint")
   */
  public function imprintAction()
  {
    return $this->render('app/main/imprint.html.twig');
  }

  /**
   * @Route("/kontakt", _name="contact")
   */
  public function contactAction(Request $request)
  {
    $form = $this->createForm(new ContactType());

    if ($request->isMethod('POST')) {
      $form->bind($request);

      if ($form->isValid()) {
        $message = \Swift_Message::newInstance()
            ->setSubject($form->get('subject')->getData())
            ->setFrom($form->get('email')->getData())
            ->setTo('contact@example.com')
            ->setBody(
            $this->render(
                'LCWebsiteBundle:app:mail:contact.html.twig', array(
                'ip' => $request->getClientIp(),
                'name' => $form->get('name')->getData(),
                'message' => $form->get('message')->getData()
                )
            )
        );

        $this->get('mailer')->send($message);

        $request->getSession()->getFlashBag()->add('success', 'Your email has been sent! Thanks!');

        return $this->redirect($this->generateUrl('contact'));
      }
    }

//    return array(
//        'form' => $form->createView()
//    );

    return $this->render('app/main/contact.html.twig', array(
            'form' => $form->createView()
    ));
  }

  /**
   * @Route("/privacy", name="privacy")
   */
  public function privacyAction()
  {
    return $this->render('app/main/privacy.html.twig');
  }

  /**
   * @Route("/info", name="info")
   */
  public function infoAction()
  {
    return $this->render('app/main/info.html.twig');
  }

  /**
   * @Route("/partner", name="partner")
   */
  public function partnerAction()
  {
    return $this->render('app/main/partner.html.twig');
  }

  /**
   * @Route("/faq", name="faq")
   */
  public function faqAction()
  {
    return $this->render('app/main/faq.html.twig');
  }

  /**
   * @Route("/roadmap", name="roadmap")
   */
  public function roadmapAction()
  {
    return $this->render('app/main/roadmap.html.twig');
  }

  /**
   * @Route("/watch", name="watch")
   */
  public function watchAction()
  {
    return $this->render('app/main/watch.html.twig');
  }

  /**
   * @Route("/settings", name="settings")
   */
  public function settingsAction()
  {
    return $this->render('app/main/settings.html.twig');
  }

  /**
   * @Route("/socialmedia", name="socialmedia")
   */
  public function socialmediaAction()
  {
    return $this->render('app/main/socialmedia.html.twig');
  }

  /**
   * @Route("/bug_report", name="bug_report")
   */
  public function bugreportAction()
  {
    return $this->render('app/main/bugreport.html.twig');
  }

  /**
   * @Route("/support", name="support")
   */
  public function supportAction()
  {
    return $this->render('app/main/support.html.twig');
  }

  /**
   * @Route("/event{slug}", name="event")
   */
  public function eventAction()
  {
    $show = $this->getDoctrine()->getRepository('AppBundle:Event')->findOneBy(['slug' => $slug]);

    if (!$show) {
      throw $this->createNotFoundException('Cannot find show for slug \'' . $slug . '\'.');
    }

    return $this->render('main/event.html.twig');
  }

  /**
   * @Route("/plauschangriff", name="podcast")
   */
  public function podcastAction()
  {
    return $this->render('app/main/podcast.html.twig');
  }
  
  /**
   * @Route("/dosenbeatz", name="dosenbeatz")
   */
  public function dosenbeatzAction()
  {
    return $this->render('app/main/dosenbeatz.html.twig');
  }

  /**
   * @Route("/voting", name="voting")
   */
  public function votingAction()
  {
    return $this->render('app/main/votings.html.twig');
  }
}
