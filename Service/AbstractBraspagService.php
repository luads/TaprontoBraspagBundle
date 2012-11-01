<?php 

/*
 * This file is part of the Tapronto Braspag module.
 *
 * (c) 2012 Tapronto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tapronto\BraspagBundle\Service;

use Tapronto\BraspagBundle\Soap\SoapClient;

/**
 * @author Luã de Souza <lsouza@tapronto.com.br>
 */
abstract class AbstractBraspagService
{
	protected $soap;

    protected $environment;

	protected $merchantId;

	public function __construct($environment) 
	{
        $this->environment = $environment;
    }

    protected function getSoapClient($url) {
        ini_set("soap.wsdl_cache_enabled", "0");

        if($this->soap == null) {
        	$this->soap = new SoapClient($url);
        }

        return $this->soap;
    }

    public function setSoapClient($soap) 
    {
        $this->soap = $soap;
    }

    public function generateGuid()
    {
	    $hash = strtoupper(hash('ripemd128', uniqid('', true) . md5(time() . rand(0, time()))));
	    $guid = '{'.substr($hash,  0,  8).'-'.substr($hash,  8,  4).'-'.substr($hash, 12,  4).'-'.substr($hash, 16,  4).'-'.substr($hash, 20, 12).'}';

	    return $guid;
    }

    public function getMerchantId()
    {
        return $this->merchantId;
    }

    public function setMerchantId($merchantId) 
    {
        $this->merchantId = $merchantId;
    }
}