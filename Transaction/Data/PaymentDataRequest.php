<?php 

namespace Tapronto\BraspagBundle\Transaction\Data;

class PaymentDataRequest
{
	public $PaymentMethod;
	public $Amount = 0;
	public $Currency = 'BRL';
	public $Country = 'BRA';
	public $AdditionalDataCollection = array();

	public function __construct($method = null)
	{
		if ($method) {
			$this->PaymentMethod = $method;
		}
	}

	public function addAdditionalData($name, $value)
	{
		$this->AdditionalDataCollection[] = new AdditionalData($name, $value);
	}
}