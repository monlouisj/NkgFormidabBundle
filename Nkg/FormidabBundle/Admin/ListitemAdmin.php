<?php
namespace Nkg\FormidabBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ListitemAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('slug', 'text', array('label' => 'Slug', 'read_only'=>true, 'required'=>true))
                ->add('optionlabel', 'text', array('label' => "Name", 'required'=>true))
                ->add('field', null, array("label"=>"Field"))
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
            ->add('optionlabel')
            ->add('field')
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
