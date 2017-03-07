<?php

namespace Nkg\FormidabBundle\FieldTypes;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class FieldTypes
{
  public static $field_types = array(
    "text" => "Single Line Text",
    "email" => "Email Address",
    "textarea" => "Paragraph Textarea",
    "choice" => "Dropdown Select",
    "checkbox" => "Checkbox",
    "radio" => "Radio",
    "date" => "Date Picker",
    "birthday" => "Birthday",
    "zip" => "Zip Code"
  );

  public static $classMatchings = array(
    "text" => TextType::class,
    "textarea" => TextareaType::class,
    "choice" => ChoiceType::class,
    "checkbox" => CheckboxType::class,
    "radio" => RadioType::class,
    "date" => DateType::class,
    "birthday" => BirthdayType::class,
    "email" => EmailType::class,
    "integer" => IntegerType::class,
    "number" => NumberType::class,
    "money" => MoneyType::class,

  );

  public static $optionsMatchings = array(
    "label" => "label",
    "placeholder" => "placeholder",
    "empty_data" => "emptyval",
    "required" => "required"
  );

  public static $attrMatchings = array(
    "type" => "html5type",
    "class" => "css",
    "minlength" => "minlength",
    "maxlength" => "maxlength"
  );

  public static $html5types = array(
    "text" => "text",
    "date" => "date",
    "datetime" => "datetime",
    "datetime-local" => "datetime-local",
    "month" => "month",
    "number" => "number",
    "search" => "search",
    "tel" => "tel",
    "time" => "time",
    "url" => "url",
    "week" => "week"
  );

  public static function getClassMatching($key)
  {
    if(isset(self::$classMatchings[$key])){
      return new self::$classMatchings[$key];
    }
  }
}
