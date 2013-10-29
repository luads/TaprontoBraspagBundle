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
 * @author Luã de Souza <contato@lsouza.pro.br>
 */
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