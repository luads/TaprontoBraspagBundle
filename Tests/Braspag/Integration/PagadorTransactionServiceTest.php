<?php 

/*
 * This file is part of the Tapronto Braspag module.
 *
 * (c) 2012 Tapronto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tapronto\BraspagBundle\Tests\Braspag\Integration;

use Tapronto\BraspagBundle\Model\CreditCardModel;
use Tapronto\BraspagBundle\Model\BoletoModel;
use Tapronto\BraspagBundle\Service\PagadorTransactionService;

/**
 * @author Luã de Souza <lsouza@tapronto.com.br>
 */
class PagadorTransactionServiceTest extends \PHPUnit_Framework_TestCase
{
	// TODO: isolar a chave de testes?
	const HOMOLOG_KEY = '12345678-1234-1234-1234-123456789012';

	public function testCreditCardAuthorizeSuccess()
	{
		$service = new PagadorTransactionService('homolog');
		$service->setMerchantId(self::HOMOLOG_KEY);

		$model = $this->getCreditCardModel();

		$result = $service->authorize($model);

		$this->assertNotNull($result);
		$this->assertTrue(isset($result['orderData']));
		$this->assertTrue(isset($result['paymentData']));
		$this->assertNotNull($result['paymentData']->BraspagTransactionId);
	}

	/*
	* Teste descontinuado porque não sei qual PaymentMethod deve ser passado pro boleto
	*/
	public function _testBoletoAuthorizeSuccess()
	{
		$service = new PagadorTransactionService('homolog');
		$service->setMerchantId(self::HOMOLOG_KEY);
		
		$model = $this->getBoletoModel();

		$result = $service->authorize($model);

		$this->assertNotNull($result);
		$this->assertNotNull($result->BraspagTransactionId);
	}

	protected function getCreditCardModel()
	{
		$model = new CreditCardModel();

		$model->setOrderId('1234')
			->setAmount(150.00)
			->setMethod('997')
			->setCurrency('EUR')
			->setNumberOfPayments('1')
			->setPaymentPlan('0')
			->setTransactionType('2')
			->setCardHolder('Comprador teste')
			->setCardNumber('0000000000000001')
			->setCardSecurityCode('123')
			->setCardExpirationDate('05/2018')
			->setCustomerName('Fulano de tal')
			->setCustomerEmail('123oliveira4@gmail.com')
		;

		return $model;
	}

	protected function getBoletoModel()
	{
		$model = new BoletoModel();

		$model->setOrderId('1234')
			->setAmount(150.00)
			->setMethod('997')
			->setCustomerName('Fulano de tal')
			->setCustomerEmail('123oliveira4@gmail.com')
			->setNumber('0')
			->setInstructions('Teste boleto')
			->setExpirationDate(date('m/d/Y', strtotime('+3 days')))
		;

		return $model;
	}
}