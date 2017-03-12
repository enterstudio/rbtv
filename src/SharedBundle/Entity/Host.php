<?php

namespace SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Host
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
   * @ORM\Column(type="text")
   */
  protected $description;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $since;

  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $logo;

  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $slug;

  /**
   * @ORM\ManyToMany(targetEntity="Show", mappedBy="hosts")
   **/
  private $shows;

    public function __construct()
    {
        $this->shows = new \Doctrine\Common\Collections\ArrayCollection();
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
   * @return Host
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
   * @return Host
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
   * Set since.
   *
   * @param \DateTime $since
   *
   * @return Host
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
   * Set logo.
   *
   * @param string $logo
   *
   * @return Host
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
   * @return Host
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
   * Add shows.
   *
   * @param \SharedBundle\Entity\Show $shows
   *
   * @return Host
   */
  public function addShow(\SharedBundle\Entity\Show $shows)
  {
      $this->shows[] = $shows;

      return $this;
  }

  /**
   * Remove shows.
   *
   * @param \SharedBundle\Entity\Show $shows
   */
  public function removeShow(\SharedBundle\Entity\Show $shows)
  {
      $this->shows->removeElement($shows);
  }

  /**
   * Get shows.
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getShows()
  {
      return $this->shows;
  }
}
