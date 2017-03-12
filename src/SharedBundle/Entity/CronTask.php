<?php
/**
 * Description of CronTask
 *
 * @author huskynarr
 */
namespace SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @UniqueEntity("Cron")
 */
class CronTask
{

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string")
   */
  private $name;

  /**
   * @ORM\Column(type="array")
   */
  private $commands;

  /**
   * @ORM\Column(name="`interval`", type="integer")
   */
  private $interval;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $lastrun;

  /**
   * 
   * @return type
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * 
   * @return type
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * 
   * @param type $name
   * @return \SharedBundle\Entity\CronTask
   */
  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  /**
   * 
   * @return type
   */
  public function getCommands()
  {
    return $this->commands;
  }

  /**
   * 
   * @param type $commands
   * @return \SharedBundle\Entity\CronTask
   */
  public function setCommands($commands)
  {
    $this->commands = $commands;
    return $this;
  }

  /**
   * 
   * @return type
   */
  public function getInterval()
  {
    return $this->interval;
  }

  /**
   * 
   * @param type $interval
   * @return \SharedBundle\Entity\CronTask
   */
  public function setInterval($interval)
  {
    $this->interval = $interval;
    return $this;
  }

  /**
   * 
   * @return type
   */
  public function getLastRun()
  {
    return $this->lastrun;
  }

  /**
   * 
   * @param type $lastrun
   * @return \SharedBundle\Entity\CronTask
   */
  public function setLastRun($lastrun)
  {
    $this->lastrun = $lastrun;
    return $this;
  }
}