TaprontoBraspagBundle
=====================

SF2 Bundle pra comunicação com o gateway de pagamento da Braspag

Webservices suportados
-----

Atualmente o único webservice contemplado é o Pagador Transaction

    use Tapronto\BraspagBundle\Model\CreditCardModel;

    $braspag = $this->get('tapronto_braspag.pagador_transaction');
    $model = new CreditCardModel();

    $model->setOrderId('1234')
        ->setAmount(150.00)
        ->setMethod('997')
        ->setCurrency('BRL')
        ->setNumberOfPayments('1')
        ->setPaymentPlan('0')
        ->setTransactionType('2')
        ->setCardHolder('Comprador teste')
        ->setCardNumber('0000000000000001')
        ->setCardSecurityCode('123')
        ->setCardExpirationDate('05/2018')
        ->setCustomerName('Fulano de tal')
        ->setCustomerEmail('123oliveira4@gmail.com')
    ;

    $response = $braspag->authorize($model);