<?php

namespace Nkg\FormidabBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
  /**
   * @Route("/{form_slug}", name="_dab")
   */
  public function indexAction($form_slug, Request $request)
  {

      $formiDab = $this->get('nkg.form');
      $builder = $this->createFormBuilder(array());

      $conf = $formiDab->build($form_slug, $builder);

      //build Form
      $symf_form = $conf->builder->getForm();
      $symf_form->handleRequest($request);

      if ($symf_form->isSubmitted() && $symf_form->isValid()) {

      }

      return $this->render('NkgFormidabBundle::form.html.twig',
        array(
          'form' => $symf_form->createView(),
          'formconf' => $conf->form_conf
        )
      );
  }
}
