<?php
namespace Nkg\FormidabBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Nkg\FormidabBundle\FieldTypes\FieldTypes as NkgFieldTypes;

class FieldAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
              ->with('Configuration', array('class' => 'col-xs-6'))
                ->add('slug', 'text', array('label' => 'Slug', 'read_only'=>true, 'required'=>true))
                ->add('name', 'text', array('label' => "Name", 'required'=>true))
                ->add('label', 'text', array('label' => "Label", 'required'=>false))
                ->add('active', 'checkbox', array('label' => 'ON','required'=>false))
                ->add('fieldtype', 'choice', array(
                  'label' => 'Type',
                  'choices'=> NkgFieldTypes::$field_types,
                  'empty_value' => 'Choose a type',
                  'required'=>true
                ))
                ->add('required', 'checkbox', array('label' => 'Required','required'=>false))
                ->add('lists', 'sonata_type_collection', array(
                      'label'       => "Manage options:",
                      'by_reference'       => false,
                      'cascade_validation' => true,
                  ), array(
                      'edit' => 'inline',
                      'inline' => 'table'
                  ))
                ->add('position', 'text', array('label' => "Position", 'required'=>true))
                ->add('form', null, array("label"=>"Parent"))
              ->end()
              ->with('Options', array('class' => 'col-xs-6'))
                ->add('html5type', 'choice', array(
                  'label' => 'HTML5 Type',
                  'choices'=> NkgFieldTypes::$html5types,
                  'empty_value' => 'Choose a type',
                  'required'=>false
                ))
                ->add('emptyval', 'text', array('label' => "Value if empty", 'required'=>false))
                ->add('css', 'text', array('label' => "CSS class", 'required'=>false))
                ->add('helper', 'text', array('label' => "Helper text", 'required'=>false))
                ->add('minlength', 'number', array('label' => "Min length", 'required'=>false))
                ->add('maxlength', 'number', array('label' => "Max length", 'required'=>false))
                ->add('placeholder', 'text', array('label' => "Placeholder", 'required'=>false))
                ->add('hidelabel', 'checkbox', array('label' => 'Hide label','required'=>false))
              ->end()



        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('slug')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('slug')
            ->add('fieldtype')
            ->add('form')
        ;
    }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function getNewInstance()
    // {
    //     $form = parent::getNewInstance();
    //
    //     return $form;
    // }
}
