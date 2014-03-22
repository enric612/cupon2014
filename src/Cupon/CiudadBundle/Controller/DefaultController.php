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
    public function listaCiudadesAction($ciudad)
    {
    	$em = $this->getDoctrine()->getManager();
    	$ciudades = $em->getRepository('CiudadBundle:Ciudad')->findAll();

    	return $this->render(
    		'CiudadBundle:Default:listaCiudades.html.twig',
    		array(
    			'ciudadActual' => $ciudad,
    			'ciudades' => $ciudades)
    		);
    }
    public function recientesAction($ciudad)
    {
        $em = $this->getDoctrine()->getManager();
        $ciudad = $em->getRepository('CiudadBundle:Ciudad')->findOneBySlug($ciudad);
        
        if (!$ciudad) {
            throw $this->createNotFoundException('No existe la ciudad');
        }
        
        $cercanas = $em->getRepository('CiudadBundle:Ciudad')->findCercanas($ciudad->getId());
        $ofertas = $em->getRepository('OfertaBundle:Oferta')->findRecientes($ciudad->getId());
        return $this->render('CiudadBundle:Default:recientes.html.twig',
            array(
                'ciudad' => $ciudad,
                'cercanas' => $cercanas,
                'ofertas' => $ofertas
            )
        );
    }
}