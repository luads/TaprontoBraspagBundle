<?php 

namespace Tapronto\BraspagBundle\Tests\Braspag\Service;

use Tapronto\BraspagBundle\Service\PagadorTransactionService;

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