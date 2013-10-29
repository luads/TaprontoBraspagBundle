<?php 

/*
 * This file is part of the Tapronto Braspag module.
 *
 * (c) 2012 Tapronto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tapronto\BraspagBundle\Model;

use Tapronto\BraspagBundle\Transaction\Data\BoletoDataRequest;

/**
 * @author Luã de Souza <contato@lsouza.pro.br>
 */
class BoletoModel extends AbstractModel
{
    public $number;
    public $instructions;
    public $expirationDate;

    public function __construct()
    {
        $this->setType(parent::TYPE_CREDITCARD);
    }

    public function getPaymentData()
    {
        $data = new BoletoDataRequest();

        $data->Amount = $this->amount;
        $data->Currency = $this->currency;
        $data->PaymentMethod = $this->method;
        $data->BoletoNumber = $this->number;
        $data->BoletoInstructions = $this->instructions;
        $data->BoletoExpirationDate = $this->expirationDate;

        return $data;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    public function getInstructions()
    {
        return $this->instructions;
    }

    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
        return $this;
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

}