<?php 

namespace Tapronto\BraspagBundle\Transaction\Data;

class BoletoDataRequest extends PaymentDataRequest
{
	public $BoletoNumber;
	public $BoletoInstructions;
	public $BoletoExpirationDate;
}