<?php

namespace Nkg\FormidabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Nkg\FormidabBundle\Utils\Utils as NkgUtils;

/**
 * Formulaire
 *
 * @ORM\Table(name="form")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="Nkg\FormidabBundle\Entity\FormulaireRepository")
 */
class Formulaire
{
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
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdat", type="datetime")
     */
    private $createdat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity="\Nkg\FormidabBundle\Entity\Field", mappedBy="form", cascade={"persist"})
     */
    private $fields;

    public function __construct() {
        $this->fields = new ArrayCollection();
        $this->fieldvalues = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="\Nkg\FormidabBundle\Entity\Fieldvalue", mappedBy="form")
     */
    private $fieldvalues;

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
     * Set slug
     *
     * @param string $slug
     * @return Formulaire
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
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Formulaire
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Formulaire
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Add fields
     *
     * @param \Nkg\FormidabBundle\Entity\Field $fields
     * @return Formulaire
     */
    public function addField(\Nkg\FormidabBundle\Entity\Field $fields)
    {
        $this->fields[] = $fields;

        return $this;
    }

    /**
     * Remove fields
     *
     * @param \Nkg\FormidabBundle\Entity\Field $fields
     */
    public function removeField(\Nkg\FormidabBundle\Entity\Field $fields)
    {
        $this->fields->removeElement($fields);
    }

    /**
     * Get fields
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFields()
    {
        return $this->fields;
    }

    // /**
    //  * Get valid fields
    //  *
    //  * @return \Doctrine\Common\Collections\Collection
    //  */
    // public function getValidFields()
    // {
    //     return array_filter($this->getFields()->getValues(), function($v){
    //       return $v->getActive() === true;
    //     });
    // }

    /**
     * Set description
     *
     * @param string $description
     * @return Formulaire
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function __toString()
    {
      return $this->getSlug();
    }

    /** @ORM\PrePersist
    * @ORM\PreUpdate()
    */
   function onPrePersist()
   {
      $now = new \DateTime("now");
      if(is_null($this->getCreatedat())){
       $this->setCreatedat($now);
      }

      //slugify slug
      $slug = NkgUtils::slugify($this->getSlug());
      $this->setSlug($slug);

      return $this;
   }

    /**
     * Add fieldvalues
     *
     * @param \Nkg\FormidabBundle\Entity\Fieldvalue $fieldvalues
     * @return Formulaire
     */
    public function addFieldvalue(\Nkg\FormidabBundle\Entity\Fieldvalue $fieldvalues)
    {
        $this->fieldvalues[] = $fieldvalues;

        return $this;
    }

    /**
     * Remove fieldvalues
     *
     * @param \Nkg\FormidabBundle\Entity\Fieldvalue $fieldvalues
     */
    public function removeFieldvalue(\Nkg\FormidabBundle\Entity\Fieldvalue $fieldvalues)
    {
        $this->fieldvalues->removeElement($fieldvalues);
    }

    /**
     * Get fieldvalues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFieldvalues()
    {
        return $this->fieldvalues;
    }
}
