<?php 

/*
 * This file is part of the Tapronto Braspag module.
 *
 * (c) 2012 Tapronto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tapronto\BraspagBundle\Tests\Braspag\Service;

use Tapronto\BraspagBundle\Service\PagadorTransactionService;

/**
 * @author Luã de Souza <lsouza@tapronto.com.br>
 */
class BraspagServiceTest extends \PHPUnit_Framework_TestCase
{
	public function testGuid()
	{
		$service = new PagadorTransactionService('homolog');

		$guid = $service->generateGuid();

		$this->assertEquals(strlen($guid), 38); // 32 digits, 4 dashes, 2 brackets
		$this->assertEquals(strlen(preg_replace("/[^-]*/", '', $guid)), 4); // 4 dashes
	}
}