<?php
/**
 * Created by PhpStorm.
 * User: bootta
 * Date: 01.11.17
 * Time: 9:54
 */

namespace Json\Controller;
use JsonSchema\Exception\JsonDecodingException;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Json\Server\Server;
use Zend\Log\Logger;


class JsonController extends AbstractActionController
{
    //Server
	public function indexAction()
	{
		$dirlog = dirname(dirname(__DIR__))."/logs";
		try
		{
			file_put_contents($dirlog."/request_".date("d.m.y").".log", file_get_contents("php://input").PHP_EOL, FILE_APPEND);
			$this->jsonRpcHandler();
		}
		catch (JsonDecodingException $d)
		{
			file_put_contents($dirlog."/logicError.log", $d->getMessage().PHP_EOL, FILE_APPEND);
		}
		catch (\Exception $e)
		{
			file_put_contents($dirlog."/error.log", $e->getMessage().PHP_EOL, FILE_APPEND);
		}
        

		die();
	}

	//Client
    public function clientAction()
    {
        $client = new \Zend\Json\Server\Client("http://ex.dev/jsonrpc");

        $client->call('subtract', [12, 13]);

        $res = $client->getLastResponse()->getResult();

        print_r($res);

        die();
    }


	private function jsonRpcHandler()
	{
		$server = new Server();
		$server->setClass("Json\\Controller\\Calculator");


		/*		Пока не понятно что это!!!!!!!!!!!!!!!!!!
				if ('GET' === $_SERVER['REQUEST_METHOD']) {
					// Indicate the URL endpoint, and the JSON-RPC version used:
					$server->setTarget('/jsonrpc')
						->setEnvelope(\Zend\Json\Server\Smd::ENV_JSONRPC_2);

					// Grab the SMD
					$smd = $server->getServiceMap();

					// Return the SMD to the client
					header('Content-Type: application/json');
					echo $smd;
					return;
				}

		*/

		$server->handle();
	}
}