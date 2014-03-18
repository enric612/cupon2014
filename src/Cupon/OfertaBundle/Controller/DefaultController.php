<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
	public function portadaAction($ciudad = null)
	{
		$em = $this->getDoctrine()->getManager();

		

		$oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
			'ciudad'			=> $this->container->getParameter('cupon.ciudad_por_defecto'),
			'fechaPublicacion'	=> new \DateTime('2014-03-18 23:59:59') // provisional...
			));
		
		if(!$oferta){
			throw $this->createNotFoundException(
				"No hay ninguna oferta del dia para esta ciudad"
			);
			
		}

		return $this->render(
			'OfertaBundle:Default:portada.html.twig',
			array('oferta' => $oferta,
				)
			);
	}
	
}
