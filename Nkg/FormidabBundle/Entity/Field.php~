<?php

namespace Nkg\FormidabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Nkg\FormidabBundle\Utils\Utils as NkgUtils;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Field
 *
 * @ORM\Table(name="field")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="Nkg\FormidabBundle\Entity\FieldRepository")
 */
class Field
{

    /**
     * @ORM\OneToMany(targetEntity="\Nkg\FormidabBundle\Entity\Listitem", mappedBy="field", cascade={"persist"})
     */
    private $lists;

    public function __construct() {
        $this->lists = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="\Nkg\FormidabBundle\Entity\Formulaire", inversedBy="fields")
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     */
    private $form;

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
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hidelabel", type="boolean")
     */
    private $hidelabel;

    /**
     * @var integer
     *
     * @ORM\Column(name="minlength", type="integer", nullable=true)
     */
    private $minlength;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxlength", type="integer", nullable=true)
     */
    private $maxlength;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var boolean
     *
     * @ORM\Column(name="required", type="boolean")
     */
    private $required;

    /**
     * @var string
     *
     * @ORM\Column(name="fieldtype", type="string", length=255)
     */
    private $fieldtype;

    /**
     * @var string
     *
     * @ORM\Column(name="helper", type="string", length=255, nullable=true)
     */
    private $helper;

    /**
     * @var string
     *
     * @ORM\Column(name="css", type="string", length=255, nullable=true)
     */
    private $css;

    /**
     * @var string
     *
     * @ORM\Column(name="placeholder", type="string", length=255, nullable=true)
     */
    private $placeholder;

    /**
     * @var string
     *
     * @ORM\Column(name="emptyval", type="string", length=255, nullable=true)
     */
    private $emptyval;

    /**
     * @var string
     *
     * @ORM\Column(name="html5type", type="string", length=255, nullable=true)
     */
    private $html5type;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdat", type="datetime")
     */
    private $createdat;


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
     * @return Field
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
     * Set name
     *
     * @param string $name
     * @return Field
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set hidelabel
     *
     * @param boolean $hidelabel
     * @return Field
     */
    public function setHidelabel($hidelabel)
    {
        $this->hidelabel = $hidelabel;

        return $this;
    }

    /**
     * Get hidelabel
     *
     * @return boolean
     */
    public function getHidelabel()
    {
        return $this->hidelabel;
    }

    /**
     * Set required
     *
     * @param boolean $required
     * @return Field
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required
     *
     * @return boolean
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set fieldtype
     *
     * @param string $fieldtype
     * @return Field
     */
    public function setFieldType($fieldtype)
    {
        $this->fieldtype = $fieldtype;

        return $this;
    }

    /**
     * Get fieldtype
     *
     * @return string
     */
    public function getFieldType()
    {
        return $this->fieldtype;
    }

    /**
     * Set helper
     *
     * @param string $helper
     * @return Field
     */
    public function setHelper($helper)
    {
        $this->helper = $helper;

        return $this;
    }

    /**
     * Get helper
     *
     * @return string
     */
    public function getHelper()
    {
        return $this->helper;
    }

    /**
     * Set css
     *
     * @param string $css
     * @return Field
     */
    public function setCss($css)
    {
        $this->css = $css;

        return $this;
    }

    /**
     * Get css
     *
     * @return string
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * Set placeholder
     *
     * @param string $placeholder
     * @return Field
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * Get placeholder
     *
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * Set emptyval
     *
     * @param string $emptyval
     * @return Field
     */
    public function setEmptyval($emptyval)
    {
        $this->emptyval = $emptyval;

        return $this;
    }

    /**
     * Get emptyval
     *
     * @return string
     */
    public function getEmptyval()
    {
        return $this->emptyval;
    }

    /**
     * Set html5type
     *
     * @param string $html5type
     * @return Field
     */
    public function setHtml5type($html5type)
    {
        $this->html5type = $html5type;

        return $this;
    }

    /**
     * Get html5type
     *
     * @return string
     */
    public function getHtml5type()
    {
        return $this->html5type;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Field
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
     * Set form
     *
     * @param \Nkg\FormidabBundle\Entity\Formulaire $form
     * @return Field
     */
    public function setForm(\Nkg\FormidabBundle\Entity\Formulaire $form = null)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form
     *
     * @return \Nkg\FormidabBundle\Entity\Formulaire
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set label
     *
     * @param string $label
     * @return Field
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Field
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

    public function __toString()
    {
      return $this->getSlug();
    }
    /** @ORM\PrePersist
    * @ORM\PreUpdate()
    */
   function onPrePersist()
   {
      //set createdat
      $now = new \DateTime("now");
      if(is_null($this->getCreatedat())){
       $this->setCreatedat($now);
      }

      //slugify name
      $name = NkgUtils::slugify($this->getName());
      $this->setName($name);

      //set slug
      $parent = $this->getForm();
      if($parent){
        $this->setSlug(NkgUtils::slugify($parent->getSlug()."_".$name));
      }

      return $this;
   }

    /**
     * Set minlength
     *
     * @param integer $minlength
     * @return Field
     */
    public function setMinlength($minlength)
    {
        $this->minlength = $minlength;

        return $this;
    }

    /**
     * Get minlength
     *
     * @return integer
     */
    public function getMinlength()
    {
        return $this->minlength;
    }

    /**
     * Set maxlength
     *
     * @param integer $maxlength
     * @return Field
     */
    public function setMaxlength($maxlength)
    {
        $this->maxlength = $maxlength;

        return $this;
    }

    /**
     * Get maxlength
     *
     * @return integer
     */
    public function getMaxlength()
    {
        return $this->maxlength;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Field
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Add lists
     *
     * @param \Nkg\FormidabBundle\Entity\Listitem $lists
     * @return Field
     */
    public function addList(\Nkg\FormidabBundle\Entity\Listitem $lists)
    {
        $this->lists[] = $lists;

        return $this;
    }

    /**
     * Remove lists
     *
     * @param \Nkg\FormidabBundle\Entity\Listitem $lists
     */
    public function removeList(\Nkg\FormidabBundle\Entity\Listitem $lists)
    {
        $this->lists->removeElement($lists);
    }

    /**
     * Get lists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLists()
    {
        return $this->lists;
    }
}
