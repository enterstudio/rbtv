<?php namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{

  public function mainMenu(FactoryInterface $factory, array $options)
  {
    $menu = $factory->createItem('root');
    $menu->setChildrenAttribute('class', 'nav navbar-nav');
    $this->addMainLeftMenu($menu);

    return $menu;
  }

  public function mainRightMenu(FactoryInterface $factory, array $options)
  {
    $menu = $factory->createItem('root');
    $this->addMainRightMenu($menu);

    return $menu;
  }

  protected function addMainLeftMenu(ItemInterface $menu)
  {
    $menu->addChild('Home', ['route' => 'home'])
        ->setAttribute('icon', 'fa fa-fw fa-home');

    $menu->addChild('Plan', ['route' => 'schedule'])
        ->setAttribute('icon', 'fa fa-fw fa-calendar');

    $menu->addChild('Sendungen', ['route' => 'shows'])
        ->setAttribute('dropdown', true)
        ->setAttribute('icon', 'fa fa-fw fa fa-video-camera');
    $menu['Sendungen']->addChild('Übersicht', ['route' => 'shows'])
        ->setAttribute('icon', 'fa fa-fw fa-video-camera')
        ->setAttribute('divider_append', true);
    //@todo REad Shows from Database
    $menu['Sendungen']->addChild('Bohn Jour', ['route' => 'show', 'routeParameters' => ['slug' => 'bohnjour']])
        ->setAttribute('icon', 'fa fa-fw fa-users');
    $menu['Sendungen']->addChild('RBTV News', ['route' => 'show', 'routeParameters' => ['slug' => 'rbtv-news']])
        ->setAttribute('icon', 'fa fa-fw fa-globe')
        ->setAttribute('divider_append', true);
    $menu['Sendungen']->addChild('Aktuelle Sendung', ['route' => 'current'])
        ->setAttribute('icon', 'fa fa-fw fa-television');
    $menu['Sendungen']->addChild('Jetzt anschauen', ['route' => 'watch'])
        ->setAttribute('icon', 'fa fa-fw fa-television');
    $menu['Sendungen']->addChild('Benachrichtigung', ['route' => 'watch_alert'])
        ->setAttribute('icon', 'fa fa-fw fa-television')
        ->setAttribute('divider_append', true);
    $menu['Sendungen']->addChild('Podcast', ['route' => 'podcast'])
        ->setAttribute('icon', 'fa fa-fw fa-headphones');
    $menu['Sendungen']->addChild('Dosenbeatz', ['route' => 'dosenbeatz'])
        ->setAttribute('icon', 'fa fa-fw fa-music');


    $menu->addChild('Spiele')
        ->setAttribute('dropdown', true)
        ->setAttribute('icon', 'fa fa-fw fa-gamepad');
    $menu['Spiele']->addChild('Mate Knights', ['route' => 'mateknights'])
        ->setAttribute('icon', 'fa fa-fw fa-star')
        ->setAttribute('divider_append', true);
    $menu['Spiele']->addChild('Ziegenproblem', ['route' => 'ziegenproblem'])
        ->setAttribute('icon', 'fa fa-fw fa-users');
    $menu['Spiele']->addChild('Welche Bohne bin ich', ['route' => 'bohnenraten'])
        ->setAttribute('icon', 'fa fa-fw fa-music');
    $menu['Spiele']->addChild('Quizduell', ['route' => 'quizduell'])
        ->setAttribute('icon', 'fa fa-fw fa-globe');
    $menu['Spiele']->addChild('Bohnenquiz', ['route' => 'bohnenquiz'])
        ->setAttribute('icon', 'fa fa-fw fa-globe')
        ->setAttribute('divider_append', true);
    $menu['Spiele']->addChild('Votings', ['route' => 'votings'])
        ->setAttribute('icon', 'fa fa-fw fa-twitch');


    $menu->addChild('Statistik')
        ->setAttribute('dropdown', true)
        ->setAttribute('icon', 'fa fa-fw fa-line-chart');
    $menu['Statistik']->addChild('Übersicht', ['route' => 'stats'])
        ->setAttribute('icon', 'fa fa-fw fa-star')
        ->setAttribute('divider_append', true);
    $menu['Statistik']->addChild('0815', ['route' => 'shows'])
        ->setAttribute('icon', 'fa fa-fw fa-users');
    $menu['Statistik']->addChild('Dosenbeatz', ['route' => 'shows'])
        ->setAttribute('icon', 'fa fa-fw fa-music');
    $menu['Statistik']->addChild('RBTV News', ['route' => 'shows'])
        ->setAttribute('icon', 'fa fa-fw fa-globe')
        ->setAttribute('divider_append', true);
    $menu['Statistik']->addChild('Twitch', ['route' => 'stats_twitch'])
        ->setAttribute('icon', 'fa fa-fw fa-twitch');
    $menu['Statistik']->addChild('Youtube', ['route' => 'stats_youtube'])
        ->setAttribute('icon', 'fa fa-fw fa-youtube');
    $menu['Statistik']->addChild('Facebook', ['route' => 'stats_facebook'])
        ->setAttribute('icon', 'fa fa-fw fa-facebook');
    $menu['Statistik']->addChild('Twitter', ['route' => 'stats_twitter'])
        ->setAttribute('icon', 'fa fa-fw fa-twitter');
    $menu['Statistik']->addChild('Reddit', ['route' => 'stats_reddit'])
        ->setAttribute('icon', 'fa fa-fw fa-reddit');

    return $menu;
  }

  protected function addMainRightMenu(ItemInterface $menu)
  {
    $menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');

    $menu->addChild('AboutUs', ['label' => 'Über uns'])
        ->setAttribute('dropdown', true)
        ->setAttribute('icon', 'fa fa-fw fa-info');
    $menu['AboutUs']->addChild('Info', ['route' => 'info'])
        ->setAttribute('icon', 'fa fa-fw fa-info');
    $menu['AboutUs']->addChild('F.A.Q.', ['route' => 'faq'])
        ->setAttribute('icon', 'fa fa-fw fa-question');
    $menu['AboutUs']->addChild('Roadmap', ['route' => 'roadmap'])
        ->setAttribute('icon', 'fa fa-fw fa-road');
    $menu['AboutUs']->addChild('SocialMedia', ['route' => 'socialmedia'])
        ->setAttribute('icon', 'fa fa-fw  fa-comments');
    $menu['AboutUs']->addChild('Datenschutz', ['route' => 'privacy'])
        ->setAttribute('icon', 'fa fa-fw fa-database')
        ->setAttribute('divider_append', true);
    $menu['AboutUs']->addChild('Partner / Sponsoren', ['route' => 'partner'])
        ->setAttribute('icon', 'fa fa-fw fa-trophy')
        ->setAttribute('divider_append', true);
    $menu['AboutUs']->addChild('Bug melden', ['route' => 'bug_report'])
        ->setAttribute('icon', 'fa fa-fw fa-bug');
    $menu['AboutUs']->addChild('Support', ['route' => 'support'])
        ->setAttribute('icon', 'fa fa-fw fa-heart');
    $menu['AboutUs']->addChild('Kontakt', ['route' => 'contact'])
        ->setAttribute('icon', 'fa fa-fw fa-commenting');
    $menu['AboutUs']->addChild('Impressum', ['route' => 'imprint'])
        ->setAttribute('icon', 'fa fa-fw fa-envelope-o');

    return $menu;
  }

  public function breadcrumb(FactoryInterface $factory, array $options)
  {
    $menu = $factory->createItem('root');
    $this->addMainLeftMenu($menu);
    $this->addMainRightMenu($menu);

    return $menu;
  }
}
