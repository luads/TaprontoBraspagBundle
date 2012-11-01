<?php 

/*
 * This file is part of the Tapronto Braspag module.
 *
 * (c) 2012 Tapronto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tapronto\BraspagBundle\Transaction\Data;

/**
 * @author Luã de Souza <lsouza@tapronto.com.br>
 */
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