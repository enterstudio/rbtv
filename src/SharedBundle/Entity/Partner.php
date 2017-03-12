<?php

namespace SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Partner
{
    /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=100)
   */
  protected $name;

  /**
   * @ORM\Column(type="string", length=100)
   */
  protected $short_description;

  /**
   * @ORM\Column(type="text")
   */
  protected $description;

  /**
   * @ORM\Column(type="text")
   */
  protected $image_url;

  /**
   * Homepage URL.
   *
   * @ORM\Column(type="text")
   */
  protected $url;
}
