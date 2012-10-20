<?php 

namespace Tapronto\BraspagBundle\Transaction\Data;

class CreditCardDataRequest extends PaymentDataRequest
{
	const PAYMENT_FULL = 0;
	const PAYMENT_SPLITED = 1;
	const PAYMENT_SPLITED_CARD = 2;

	const TRANSACTION_TYPE_INVALID = 0;
	const TRANSACTION_TYPE_AUTHORIZE = 1;
	const TRANSACTION_TYPE_AUTOCAPTURE = 2;
	const TRANSACTION_TYPE_PREAUTH_AUTENTICATION = 3;
	const TRANSACTION_TYPE_AUTOCAPTURE_AUTENTICATION = 4;

	public $NumberOfPayments;
	public $PaymentPlan;
	public $TransactionType;
	public $CardHolder;
	public $CardNumber;
	public $CardSecurityCode;
	public $CardExpirationDate;
}