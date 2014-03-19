<?php

namespace Cupon\CiudadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    public function cambiarAction($ciudad)
    {
    	return new RedirectResponse($this->generateUrl(
    		'portada', 
    		array('ciudad' => $ciudad)
    	));
    }
    public function listaCiudadesAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$ciudades = $em->getRepository('CiudadBundle:Ciudad')->findAll();

    	return $this->render(
    		'CiudadBundle:Default:listaCiudades.html.twig',
    		array('ciudades' => $ciudades)
    		);
    }
}
