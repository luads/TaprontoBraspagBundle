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

use Tapronto\BraspagBundle\Transaction\Data\CreditCardDataRequest;

/**
 * @author Luã de Souza <contato@lsouza.pro.br>
 */
class CreditCardModel extends AbstractModel
{
    public $numberOfPayments;
    public $paymentPlan;
    public $transactionType;
    public $cardHolder;
    public $cardNumber;
    public $cardSecurityCode;
    public $cardExpirationDate;

    public function __construct()
    {
        $this->setType(parent::TYPE_CREDITCARD);
    }

    public function getPaymentData()
    {
        $data = new CreditCardDataRequest();

        $data->Amount = $this->amount;
        $data->Currency = $this->currency;
        $data->PaymentMethod = $this->method;
        $data->NumberOfPayments = $this->numberOfPayments;
        $data->PaymentPlan = $this->paymentPlan;
        $data->TransactionType = $this->transactionType;
        $data->CardHolder = $this->cardHolder;
        $data->CardNumber = $this->cardNumber;
        $data->CardSecurityCode = $this->cardSecurityCode;
        $data->CardExpirationDate = $this->cardExpirationDate;

        return $data;
    }

    public function getNumberOfPayments()
    {
        return $this->numberOfPayments;
    }

    public function setNumberOfPayments($numberOfPayments)
    {
        $this->numberOfPayments = $numberOfPayments;
        return $this;
    }

    public function getPaymentPlan()
    {
        return $this->paymentPlan;
    }

    public function setPaymentPlan($paymentPlan)
    {
        $this->paymentPlan = $paymentPlan;
        return $this;
    }

    public function getTransactionType()
    {
        return $this->transactionType;
    }

    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;
        return $this;
    }

    public function getCardHolder()
    {
        return $this->cardHolder;
    }

    public function setCardHolder($cardHolder)
    {
        $this->cardHolder = $cardHolder;
        return $this;
    }

    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    public function getCardSecurityCode()
    {
        return $this->cardSecurityCode;
    }

    public function setCardSecurityCode($cardSecurityCode)
    {
        $this->cardSecurityCode = $cardSecurityCode;
        return $this;
    }

    public function getCardExpirationDate()
    {
        return $this->cardExpirationDate;
    }

    public function setCardExpirationDate($cardExpirationDate)
    {
        $this->cardExpirationDate = $cardExpirationDate;
        return $this;
    }
}