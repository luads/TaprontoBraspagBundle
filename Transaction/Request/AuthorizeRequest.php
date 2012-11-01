<?php 

/*
 * This file is part of the Tapronto Braspag module.
 *
 * (c) 2012 Tapronto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tapronto\BraspagBundle\Transaction\Request;

use Tapronto\BraspagBundle\Transaction\Data\CustomerData;
use Tapronto\BraspagBundle\Transaction\Data\PaymentDataRequest;
use Tapronto\BraspagBundle\Transaction\Data\OrderData;

/**
 * @author Luã de Souza <lsouza@tapronto.com.br>
 */
class AuthorizeRequest
{
	public $RequestId;
	public $Version;
	public $OrderData;
	public $PaymentDataCollection = array();
	public $CustomerData;

	public function __construct($RequestId = null, $Version = null)
	{
		$this->RequestId = $RequestId;
		$this->Version = $Version;

		$this->OrderData = new OrderData();
		$this->CustomerData = new CustomerData();
	}

	public function addPaymentData(PaymentDataRequest $data)
	{
		$type = join('', array_slice(explode('\\', get_class($data)), -1));
		$this->PaymentDataCollection[] = new \SoapVar($data, SOAP_ENC_OBJECT, $type);
	}
}