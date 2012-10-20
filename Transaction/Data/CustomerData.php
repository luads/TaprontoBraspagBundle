<?php 

namespace Tapronto\BraspagBundle\Transaction\Data;

class CustomerData
{
	public $CustomerIdentity;
	public $CustomerName;
	public $CustomerEmail;
	public $CustomerAddressData;
	public $DeliveryAddressData;

	public function __construct()
	{
		$this->CustomerAddressData = new AddressData();
		$this->DeliveryAddressData = new AddressData();
	}
}