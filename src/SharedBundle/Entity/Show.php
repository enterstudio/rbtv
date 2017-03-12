<?php

namespace SharedBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`show`")
 */
class Show
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
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $logo;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $icon;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $since;

  /**
   * @ORM\ManyToMany(targetEntity="Host", inversedBy="shows")
   * @ORM\JoinTable(name="shows_hosts")
   */
  protected $hosts;

  /**
   * @ORM\OneToMany(targetEntity="Episode", mappedBy="show")
   */
  protected $episodes;

  /**
   * Create a new show.
   */
  public function __construct()
  {
      $this->hosts = new ArrayCollection();
      $this->episodes = new ArrayCollection();
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
   * @return Show
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
   * Set description.
   *
   * @param string $description
   *
   * @return Show
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
   * Set logo.
   *
   * @param string $logo
   *
   * @return Show
   */
  public function setLogo($logo)
  {
      $this->logo = $logo;

      return $this;
  }

  /**
   * Get logo.
   *
   * @return string
   */
  public function getLogo()
  {
      return $this->logo;
  }

  /**
   * Set slug.
   *
   * @param string $slug
   *
   * @return Show
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
   * Set since.
   *
   * @param \DateTime $since
   *
   * @return Show
   */
  public function setSince($since)
  {
      $this->since = $since;

      return $this;
  }

  /**
   * Get since.
   *
   * @return \DateTime
   */
  public function getSince()
  {
      return $this->since;
  }

  /**
   * Add hosts.
   *
   * @param \SharedBundle\Entity\Host $hosts
   *
   * @return Show
   */
  public function addHost(\SharedBundle\Entity\Host $hosts)
  {
      $this->hosts[] = $hosts;

      return $this;
  }

  /**
   * Remove hosts.
   *
   * @param \SharedBundle\Entity\Host $hosts
   */
  public function removeHost(\SharedBundle\Entity\Host $hosts)
  {
      $this->hosts->removeElement($hosts);
  }

  /**
   * Get hosts.
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getHosts()
  {
      return $this->hosts;
  }

  /**
   * Add episodes.
   *
   * @param \SharedBundle\Entity\Episode $episodes
   *
   * @return Show
   */
  public function addEpisode(\SharedBundle\Entity\Episode $episodes)
  {
      $this->episodes[] = $episodes;

      return $this;
  }

  /**
   * Remove episodes.
   *
   * @param \SharedBundle\Entity\Episode $episodes
   */
  public function removeEpisode(\SharedBundle\Entity\Episode $episodes)
  {
      $this->episodes->removeElement($episodes);
  }

  /**
   * Get episodes.
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getEpisodes()
  {
      return $this->episodes;
  }

  /**
   * Set icon.
   *
   * @param string $icon
   *
   * @return Show
   */
  public function setIcon($icon)
  {
      $this->icon = $icon;

      return $this;
  }

  /**
   * Get icon.
   *
   * @return string
   */
  public function getIcon()
  {
      return $this->icon;
  }
}
