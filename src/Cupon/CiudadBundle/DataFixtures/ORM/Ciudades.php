<?php
namespace Cupon\CiudadBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cupon\CiudadBundle\Entity\Ciudad;

class Ciudades implements FixtureInterface
{
	public function load( ObjectManager $manager ) {
		$ciudades = array(
			array( 'nombre' => 'Madrid', 'slug' => 'madrid' ),
			array( 'nombre' => 'Barcelona', 'slug' => 'barcelona' ),
			array( 'nombre' => 'Xeraco', 'slug' => 'xeraco' ),
			array( 'nombre' => 'Gandia', 'slug' => 'gandia' ),
			// ...
		);
		// Para cada ciudad ...
		foreach ( $ciudades as $ciudad ) { 

			//Crea un objeto de tipo Ciudad
			$entidad = new Ciudad(); 

			// Atributos del objeto tipo Ciudad
			$entidad->setNombre( $ciudad['nombre'] ); 
			$entidad->setSlug( $ciudad['slug'] );

			// Guarda el objeto en memoria (Ojo no se inserta en la bd)		
			$manager->persist( $entidad ); 
		}

		// Inserta los objetos guardados en la bd
		$manager->flush();
	}
}
