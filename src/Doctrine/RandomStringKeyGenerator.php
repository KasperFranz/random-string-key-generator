<?php
/**
 * Author: Maciej Szkamruk <maciej.szkamruk@gmail.com>
 * Date: 2019-06-17 13:15
 */

declare(strict_types=1);

namespace Ex3v\RandomStringKeyGenerator\Doctrine;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Ex3v\RandomStringKeyGenerator\GeneratorFactory;
use Ex3v\RandomStringKeyGenerator\GeneratorInterface;

/**
 * Represents an ID generator that generates Twitter/Youtube like unique ids
 *
 * @since  2.3
 * @author Maciej Szkamruk <maciej.szkamruk@gmail.com>
 */
final class RandomStringKeyGenerator extends AbstractIdGenerator
{

	/** {@inheritDoc} */
	public function generate(EntityManager $em, $entity)
	{
		$id = $this->buildId();

		return $id;
	}

	private function buildId(): string
	{
		static $generator = null;

		if (false === $generator instanceof GeneratorInterface)
		{
			$factory   = new GeneratorFactory();
			$generator = $factory->getGenerator();
		}

		return $generator->generateId();
	}

}
