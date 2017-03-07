<?php

namespace Nkg\FormidabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Nkg\FormidabBundle\Utils\Utils as NkgUtils;

/**
 * List
 *
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="Nkg\FormidabBundle\Entity\ListitemRepository")
 */
class Listitem
{
    /**
     * @ORM\ManyToOne(targetEntity="\Nkg\FormidabBundle\Entity\Field", inversedBy="lists")
     * @ORM\JoinColumn(name="field_id", referencedColumnName="id")
     */
    private $field;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="optionlabel", type="string", length=255)
     */
    private $optionlabel;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set optionlabel
     *
     * @param string $optionlabel
     * @return List
     */
    public function setOptionlabel($optionlabel)
    {
        $this->optionlabel = $optionlabel;

        return $this;
    }

    /**
     * Get optionlabel
     *
     * @return string
     */
    public function getOptionlabel()
    {
        return $this->optionlabel;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return List
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set field
     *
     * @param \Nkg\FormidabBundle\Entity\Field $field
     * @return Listitem
     */
    public function setField(\Nkg\FormidabBundle\Entity\Field $field = null)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return \Nkg\FormidabBundle\Entity\Field
     */
    public function getField()
    {
        return $this->field;
    }

    /** @ORM\PrePersist
    * @ORM\PreUpdate()
    */
   function onPrePersist()
   {
      //slugify name
      $slugged = NkgUtils::slugify($this->getOptionlabel());
      $this->setSlug($slugged);

      return $this;
   }
}
