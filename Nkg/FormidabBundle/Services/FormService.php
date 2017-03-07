<?php
namespace Nkg\FormidabBundle\Services;

use Symfony\Component\HttpFoundation\Session\Session;

use Doctrine\ORM\EntityManager;
use Nkg\FormidabBundle\Entity\Field as Field;
use Nkg\FormidabBundle\Entity\Formulaire as Formulaire;
use Nkg\FormidabBundle\Entity\Fieldvalue as Fieldvalue;
use Nkg\FormidabBundle\FieldTypes\FieldTypes;

use Symfony\Component\PropertyAccess\PropertyAccess;

class FormService
{
  protected $em;

  public function __construct(EntityManager $em) {
      $this->em = $em;
  }

  public function build($form_slug, $builder)
  {
    $form = $this->getForm($form_slug);
    if(!$form) throw new \Exception("Unknown form");
    $ret = new \stdClass();

    //start adding fields
    $fields = $this->em
    ->getRepository('NkgFormidabBundle:Field')
    ->getValidFields($form);

    foreach ($fields as $field) {
      $builder->add(
        $field->getName(),
        $this->getTypeClass($field),
        $this->getFieldOptions($field)
      );
    }
    $ret->builder = $builder;
    $ret->form_conf = $form;
    return $ret;
  }

  public function saveValue($field, $value, Formulaire $form,$ident)
  {
    if($field == "_token") return;

    $newVal = new Fieldvalue();
    $newVal->setField($field);
    $newVal->setValue($value);
    $newVal->setForm($form);
    $newVal->setIdentifiant($ident);
    $this->em->persist($newVal);
    $this->em->flush();
  }

  //find your form configuration
  public function getForm($slug)
  {
    $forms = $this->em->getRepository('NkgFormidabBundle:Formulaire')
    ->findBy(array("slug"=>$slug));

    return isset($forms[0]) ? $forms[0] : false;
  }

  //compute the attributes for one field
  private function getFieldAttr(Field $field)
  {
    $accessor = PropertyAccess::createPropertyAccessor();
    $attrs = array();

    foreach (FieldTypes::$attrMatchings as $attribute => $entity_field) {
      $val = $accessor->getValue($field, $entity_field);
      if(!empty($val)) $attrs[$attribute] = $val;
    }
    return $attrs;
  }

  //compute the options for one field
  public function getFieldOptions(Field $field)
  {
    $accessor = PropertyAccess::createPropertyAccessor();
    $opts = array("mapped" => false);

    foreach (FieldTypes::$optionsMatchings as $option => $entity_field) {
      $val = $accessor->getValue($field, $entity_field);
      if(!is_null($val)) $opts[$option] = $val;
    }

    $opts['attr'] = $this->getFieldAttr($field);

    if(in_array($field->getFieldType(), array("choice","radio"))){
      $opts = $this->getListItem($field,$opts);
    }

    return $opts;
  }

  //get the type associated with some types in your form's configuration
  public function getTypeClass(Field $field)
  {
    $_type = $field->getFieldType();
    if(!is_null($_type)){
      return FieldTypes::getClassMatching($_type);
    }
  }

  //get the list of options defined for choices or radio fields
  public function getListItem(Field $field, array $fieldOptions)
  {
    $list = $this->em->getRepository('NkgFormidabBundle:Listitem')
      ->findBy(array("field"=>$field));

    $arr = array();
    foreach ($list as $item) {
      $arr[$item->getSlug()] = $item->getOptionlabel();
    }

    $fieldOptions["choices"] = $arr;
    return $fieldOptions;
  }

  //get informations saved from a form
  public function getValues(Formulaire $form, array $filterBy = array())
  {
    $ret = array();
    $find = array_merge($filterBy, array("form"=>$form));
    $list = $this->em->getRepository('NkgFormidabBundle:Fieldvalue')->findBy($find);
    if(!isset($list[0])) return $ret;

    foreach ($list as $line) {
      $ret[$line->getIdentifiant()] [$line->getField()] = $line->getValue();
    }
    return $ret;
  }

  public function getFieldsNames(Formulaire $form)
  {
    if(!$form->getFields()) return array();

    return array_map(function($field){
      return $field->getName();
    }, $form->getFields()->getValues());
  }

}
