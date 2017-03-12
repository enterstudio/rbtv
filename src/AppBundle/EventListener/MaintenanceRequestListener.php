<?php

namespace AppBundle\EventListener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class MaintenanceRequestListener
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $maintenanceUntil = $this->container->hasParameter('underMaintenanceUntil') ? $this->container->getParameter('underMaintenanceUntil') : false;
        $maintenance = $this->container->hasParameter('maintenance') ? $this->container->getParameter('maintenance') : false;

        $debug = in_array($this->container->get('kernel')->getEnvironment(), ['test', 'dev']);

        if ($maintenance && !$debug) {
            $engine = $this->container->get('templating');
            $content = $engine->render('app/main/maintenance.html.twig', ['maintenanceUntil' => $maintenanceUntil]);
            $event->setResponse(new Response($content, 503));
            $event->stopPropagation();
        }
    }
}
