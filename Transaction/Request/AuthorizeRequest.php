<?php 

namespace Tapronto\BraspagBundle\Transaction\Request;

use Tapronto\BraspagBundle\Transaction\Data\CustomerData;
use Tapronto\BraspagBundle\Transaction\Data\PaymentDataRequest;
use Tapronto\BraspagBundle\Transaction\Data\OrderData;

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