<?php
namespace Cupon\OfertaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class OfertaRepository extends EntityRepository
{
	public function findOfertaDelDia($ciudad)
	{
		$fechaPublicacion = new \DateTime('now');
		$fechaPublicacion->setTime(23,59,59);

		$em = $this->getEntityManager();

		$dql = 'SELECT o, c, t
						FROM OfertaBundle:Oferta o
						JOIN o.ciudad c JOIN o.tienda t
						WHERE o.revisada = true
						AND o.fechaPublicacion < :fecha
						AND c.slug = :ciudad
						ORDER BY o.fechaPublicacion DESC';

		$consulta = $em->createQuery($dql);
		$consulta->setParameter('fecha', $fechaPublicacion);
		$consulta->setParameter('ciudad', $ciudad);
		$consulta->setMaxResults(1);

		return $consulta->getSingleResult();
	}
}