<?php 

namespace Tapronto\BraspagBundle\Service;

use Tapronto\BraspagBundle\Model\AbstractModel as PagadorTransactionModel;

use Tapronto\BraspagBundle\Exception\BraspagException;
use Tapronto\BraspagBundle\Transaction\Request\AuthorizeRequest;

class PagadorTransactionService extends AbstractBraspagService
{
	protected $wsVersion = '1.0';

	protected $serviceUrls = array(
        'homolog' => 'https://homologacao.pagador.com.br/webservice/pagadorTransaction.asmx?wsdl',
        'prod' => 'https://transaction.pagador.com.br/webservice/pagadorTransaction.asmx?wsdl',
    );

    public function authorize(PagadorTransactionModel $model)
    {
    	$soap = $this->getSoapClient();

    	$request = new AuthorizeRequest($this->generateGuid(), $this->getWsVersion());

    	$request->OrderData->MerchantId = $this->getMerchantId();
    	$request->OrderData->OrderId = $model->getOrderId();
    	$request->addPaymentData($model->getPaymentData());

    	$request->CustomerData->CustomerIdentity = $model->getCustomerIdentity();
    	$request->CustomerData->CustomerName = $model->getCustomerName();
    	$request->CustomerData->CustomerEmail = $model->getCustomerEmail();

    	$params = new \stdClass;
    	$params->request = $request;

    	$response = $soap->AuthorizeTransaction($params);
    	$response = $response->AuthorizeTransactionResult;

    	if ($response->Success) {
    		$paymentResponse = $response->PaymentDataCollection->PaymentDataResponse;

    		if (in_array($paymentResponse->Status, array(0, 1, 4))) {
    			return array(
                    'orderData' => $response->OrderData,
                    'paymentData' => $paymentResponse,
                );
    		} else {
                // TODO: melhorar o retorn dos erros
    			return false;
    		}
    		
    	} else {
    		throw new BraspagException(sprintf('An error occurred while processing your transaction'));
    	}
    }

    protected function buildRequest()
    {
    	$raw = new \stdClass;
    	$raw->request = new \stdClass;
    	$raw->request->RequestId = $this->generateGuid();
    	$raw->request->Version = $this->wsVersion;

    	return $raw;
    }

    protected function getSoapClient($url = null)
    {
        if (!$url) {
            $url = $this->serviceUrls[$this->environment];
        }

    	return parent::getSoapClient($url);
    }

    public function setWsVersion($version)
    {
    	$this->wsVersion = $version;
    }

    public function getWsVersion()
    {
    	return $this->wsVersion;
    }
}