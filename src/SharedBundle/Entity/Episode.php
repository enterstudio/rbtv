<?php

namespace SharedBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Episode
{
    /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $name;

  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $slug;

  /**
   * @ORM\Column(type="text")
   */
  protected $description;

  /**
   * @ORM\ManyToOne(targetEntity="Show", inversedBy="episodes")
   * @ORM\JoinColumn(name="show_id", referencedColumnName="id")
   */
  protected $show;

  /**
   * @ORM\OneToMany(targetEntity="Schedule", mappedBy="episode")
   */
  protected $schedules;

  /**
   * Constructor.
   */
  public function __construct()
  {
      $this->schedules = new ArrayCollection();
  }

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
   * Set name.
   *
   * @param string $name
   *
   * @return Episode
   */
  public function setName($name)
  {
      $this->name = $name;

      return $this;
  }

  /**
   * Get name.
   *
   * @return string
   */
  public function getName()
  {
      return $this->name;
  }

  /**
   * Set slug.
   *
   * @param string $slug
   *
   * @return Episode
   */
  public function setSlug($slug)
  {
      $this->slug = $slug;

      return $this;
  }

  /**
   * Get slug.
   *
   * @return string
   */
  public function getSlug()
  {
      return $this->slug;
  }

  /**
   * Set description.
   *
   * @param string $description
   *
   * @return Episode
   */
  public function setDescription($description)
  {
      $this->description = $description;

      return $this;
  }

  /**
   * Get description.
   *
   * @return string
   */
  public function getDescription()
  {
      return $this->description;
  }

  /**
   * Set show.
   *
   * @param \SharedBundle\Entity\Show $show
   *
   * @return Episode
   */
  public function setShow(\SharedBundle\Entity\Show $show = null)
  {
      $this->show = $show;

      return $this;
  }

  /**
   * Get show.
   *
   * @return \SharedBundle\Entity\Show
   */
  public function getShow()
  {
      return $this->show;
  }

  /**
   * Add schedules.
   *
   * @param \SharedBundle\Entity\Schedule $schedules
   *
   * @return Episode
   */
  public function addSchedule(\SharedBundle\Entity\Schedule $schedules)
  {
      $this->schedules[] = $schedules;

      return $this;
  }

  /**
   * Remove schedules.
   *
   * @param \SharedBundle\Entity\Schedule $schedules
   */
  public function removeSchedule(\SharedBundle\Entity\Schedule $schedules)
  {
      $this->schedules->removeElement($schedules);
  }

  /**
   * Get schedules.
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getSchedules()
  {
      return $this->schedules;
  }
}
