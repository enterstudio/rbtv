<?php

namespace SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="SharedBundle\Repository\ScheduleRepository")
 * @ORM\Table()
 */
class Schedule
{
    /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="Episode", inversedBy="schedules")
   * @ORM\JoinColumn(name="episode_id", referencedColumnName="id")
   */
  protected $episode;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $start;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $end;

  /**
   * Get id.
   *
   * @return int
   */
  public function getId()
  {
      return $this->id;
  }

  /**
   * Set start.
   *
   * @param \DateTime $start
   *
   * @return Schedule
   */
  public function setStart($start)
  {
      $this->start = $start;

      return $this;
  }

  /**
   * Get start.
   *
   * @return \DateTime
   */
  public function getStart()
  {
      return $this->start;
  }

  /**
   * Set end.
   *
   * @param \DateTime $end
   *
   * @return Schedule
   */
  public function setEnd($end)
  {
      $this->end = $end;

      return $this;
  }

  /**
   * Get end.
   *
   * @return \DateTime
   */
  public function getEnd()
  {
      return $this->end;
  }

  /**
   * Set episode.
   *
   * @param \SharedBundle\Entity\Episode $episode
   *
   * @return Schedule
   */
  public function setEpisode(\SharedBundle\Entity\Episode $episode = null)
  {
      $this->episode = $episode;

      return $this;
  }

  /**
   * Get episode.
   *
   * @return \SharedBundle\Entity\Episode
   */
  public function getEpisode()
  {
      return $this->episode;
  }
}
