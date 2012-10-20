<?php 

namespace Tapronto\BraspagBundle\Transaction\Data;

class AdditionalData
{
	public $Name;
	public $Value;

	public function __construct($Name, $Value)
	{
		$this->Name = $Name;
		$this->Value = $Value;
	}
}