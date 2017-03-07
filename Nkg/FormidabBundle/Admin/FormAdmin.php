<?php
namespace Nkg\FormidabBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FormAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('My form', array('class' => 'col-xs-12'))
              ->add('slug', 'text', array('label' => 'Slug','required'=>true,'help'=>"Will appear in the url"))
              ->add('description', 'text', array('label' => 'Description', 'required'=>false))
              ->add('createdat', 'datetime', array('label' => 'Date de création','read_only' => true,'disabled' => true))
              ->add('active', 'checkbox', array('label' => 'ON','required'=>false))
            ->end()
            ->with('Fields list', array('class' => 'col-xs-12'))
              ->add('fields', 'sonata_type_collection', array(
                    'label'       => "Here you can manage your fields:",
                    'by_reference'       => false,
                    'cascade_validation' => true,
                ), array(
                    'edit' => 'inline',
                    'sortable' => 'position',
                    'inline' => 'table'
                ))
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
            ->add('createdat')
            ->add('active')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getNewInstance()
    {
        $form = parent::getNewInstance();
        $form->setCreatedat(new \DateTime("now"));
        $form->setActive(true);
        return $form;
    }

    private function linked($object)
    {
      //set poll for opinions
      foreach($object->getFields() as $field) {
        $field->setForm($object);
      }
    }

    /**
    * {@inheritdoc}
    */
    public function prePersist($object)
    {
      $this->linked($object);
    }

    /**
    * {@inheritdoc}
    */
    public function preUpdate($object)
    {
      $this->linked($object);
    }
}
