<?php 

namespace Tapronto\BraspagBundle\Soap;

class SoapClient extends \SoapClient
{
	public $namespace = 'https://www.pagador.com.br/webservice/pagador';

	public function __doRequest($request, $location, $action, $version, $one_way = 0) 
    { 
    	$_action = join('', array_slice(explode('/', $action), -1));
    	$request = str_replace('<ns1:' . $_action . '>', '<ns1:' . $_action . ' xmlns="'.$this->namespace.'">', $request);

		return parent::__doRequest($request, $location, $action, $version);
    }
}