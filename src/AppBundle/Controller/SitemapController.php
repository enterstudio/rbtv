<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SitemapController extends Controller
{
    /**
     * @Route("/sitemap.{_format}", name="sitemap", requirements={"_format" = "xml"})
     */
    public function sitemapAction()
    {
        $em = $this->getDoctrine()->getManager();

        $urls = array();
        $hostname = $this->getRequest()->getHost();

        // Home
        $urls[] = array('loc' => $this->generateUrl('home'), 'changefreq' => 'weekly', 'priority' => '1.0');
        
        //Schedule
        $urls[] = array('loc' => $this->generateUrl('schedule'), 'changefreq' => 'weekly', 'priority' => '1.0');
        
        //Shows
        $urls[] = array('loc' => $this->generateUrl('shows'), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('watch'), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('current'), 'changefreq' => 'weekly', 'priority' => '1.0');
        
        //Shows from DB //@todo See left
        $urls[] = array('loc' => $this->generateUrl('schedule'), 'changefreq' => 'weekly', 'priority' => '1.0');
        
        //Stat
        $urls[] = array('loc' => $this->generateUrl('stats',array('youtube')), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('stats',array('youtube')), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('stats',array('youtube')), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('stats',array('youtube')), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('stats',array('youtube')), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('stats',array('youtube')), 'changefreq' => 'weekly', 'priority' => '1.0');                

        //About and Something
        $urls[] = array('loc' => $this->generateUrl('info'), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('faq'), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('roadmap'), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('privacy'), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('partner'), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('contact'), 'changefreq' => 'weekly', 'priority' => '1.0');
        $urls[] = array('loc' => $this->generateUrl('imprint'), 'changefreq' => 'weekly', 'priority' => '1.0');

        
        //Test
        $urls[] = array('loc' => $this->generateUrl('home',array('youtube')), 'changefreq' => 'weekly', 'priority' => '1.0');

        //@todo Shows, Events & mehr korrekt abrufen

        return $this->render('views/design/sitemap.html.twig', array('urls' => $urls, 'hostname' => $hostname));
    }
}
