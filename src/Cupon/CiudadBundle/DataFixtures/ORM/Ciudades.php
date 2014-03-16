<?php
namespace Cupon\CiudadBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cupon\CiudadBundle\Entity\Ciudad;
use Cupon\CiudadBundle\Util\Util;

class Ciudades implements FixtureInterface
{
	public function load( ObjectManager $manager ) {
		$ciudades = array(
			array( 'nombre' => 'Madrid', ),
			array( 'nombre' => 'Barcelona', ),
			array( 'nombre' => 'Xeraco', ),
			array( 'nombre' => 'Gandia', ),
			// ...
		);
		// Para cada ciudad ...
		foreach ( $ciudades as $ciudad ) { 

			//Crea un objeto de tipo Ciudad
			$entidad = new Ciudad(); 

			// Atributos del objeto tipo Ciudad
			$entidad->setNombre( $ciudad['nombre'] ); 
			

			// Guarda el objeto en memoria (Ojo no se inserta en la bd)		
			$manager->persist( $entidad ); 
		}

		// Inserta los objetos guardados en la bd
		$manager->flush();
	}
}
