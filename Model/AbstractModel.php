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

/**
 * @author Luã de Souza <contato@lsouza.pro.br>
 */
abstract class AbstractModel
{
    // payment types
	const TYPE_CREDITCARD = 1;
	const TYPE_BOLETO = 2;

    // payment details
	protected $orderId;
	protected $type;
    protected $method;
    protected $amount = 0;
    protected $currency = 'BRL';

    // customer details
    protected $customerIdentity;
    protected $customerName;
    protected $customerEmail;

    public function getOrderId() 
    {
        return $this->orderId;
    }
    
    public function setOrderId($orderId) 
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getType() 
    {
        return $this->type;
    }
    
    public function setType($type) 
    {
        $this->type = $type;
        return $this;
    }

    public function getAmount() 
    {
        return $this->amount;
    }
    
    public function setAmount($amount) 
    {
        $this->amount = $amount;
        return $this;
    }

    public function getMethod() 
    {
        return $this->method;
    }
    
    public function setMethod($method) 
    {
        $this->method = $method;
        return $this;
    }

    public function getCurrency() 
    {
        return $this->currency;
    }
    
    public function setCurrency($currency) 
    {
        $this->currency = $currency;
        return $this;
    }

    public function getCustomerIdentity()
    {
        return $this->customerIdentity;
    }

    public function setCustomerIdentity($customerIdentity)
    {
        $this->customerIdentity = $customerIdentity;
        return $this;
    }

    public function getCustomerName()
    {
        return $this->customerName;
    }

    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
        return $this;
    }

    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;
        return $this;
    }

}