<?php namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/stats")
 */
class StatsController extends Controller
{

  /**
   * @Route("/", name="stats")
   */
  public function indexAction()
  {
    return $this->render('app/stats/index.html.twig');
  }

  /**
   * @Route("/youtube", name="stats_youtube")
   */
  public function youtubeAction()
  {
    return $this->render('app/stats/youtube.html.twig');
  }

  /**
   * @Route("/twitch", name="stats_twitch")
   */
  public function twitchAction()
  {
    return $this->render('app/stats/twitch.html.twig');
  }

  public function get_fb_likes($url)
  {
    $query = "select total_count,like_count,comment_count,share_count,click_count from link_stat where url='{$url}'";
    $call = "https://api.facebook.com/method/fql.query?query=" . rawurlencode($query) . "&format=json";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $call);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output);
  }

  /**
   * @Route("/facebook", name="stats_facebook")
   */
  public function facebookAction()
  {
    $television = $this->get_fb_likes(" https://www.facebook.com/RocketBeansTV");
    $business = $this->get_fb_likes(" https://www.facebook.com/rocketbeans");

    return $this->render('app/stats/facebook.html.twig', ['business' => $business, 'television' => $television]);
  }

  /**
   * @Route("/twitter", name="stats_twitter")
   */
  public function twitterAction($user = "therocketbeans")
  {
    $data = array(
        'follower'=> 9805
    );

    return $this->render('app/stats/twitter.html.twig', ['twitter' => $data]);
  }

  /**
   * @Route("/reddit", name="stats_reddit")
   */
  public function redditAction()
  {
    return $this->render('app/stats/reddit.html.twig');
  }
}
