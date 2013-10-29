<?php 

/*
 * This file is part of the Tapronto Braspag module.
 *
 * (c) 2012 Tapronto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tapronto\BraspagBundle\Soap;

/**
 * @author Luã de Souza <contato@lsouza.pro.br>
 */
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