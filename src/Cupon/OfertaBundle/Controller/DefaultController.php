<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
	public function portadaAction()
	{
		$em = $this->getDoctrine()->getManager();

		$fechaPublicacion = new \DateTime('today');

		$oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
			'ciudad'			=> 1,
			'fechaPublicacion'	=> new \DateTime('2014-03-18 23:59:59') // provisional...
			));
		
		return $this->render(
			'OfertaBundle:Default:portada.html.twig',
			array('oferta' => $oferta,
				)
			);
	}
	
}
