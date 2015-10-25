<?php
/**
 * AbstractApi.php
 * Freax, started: Oct 26, 2015 4:45:36 PM.
 *
 * @author based on https://github.com/jlinn/mandrill-api-php
 *
 * @see https://mandrillapp.com/api/docs/
 */

/**
 * @namespace
 */
namespace Mandrill\Api;

/*
 * @uses
 */
use Zend\Json\Json;
use Zend\Http\Client;
use Zend\Http\Request;
use Zend\Http\Exception\RuntimeException as HttpRuntimeException;
use Zend\Json\Exception\RuntimeException as JsonRuntimeException;
use Mandrill\Exception as MandrillException;

/**
 * Class AbstractApi.
 */
abstract class AbstractApi
{
    const BASE_URL = 'https://mandrillapp.com/api/1.0/';

    /**
     * @var string Mandrill API key
     */
    private $apiKey;

    /**
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Send a request to Mandrill. All requests are sent via HTTP POST.
     *
     * @param string $url
     * @param array  $body
     *
     * @throws Mandrill\Exception
     *
     * @return array
     */
    protected function request($url, array $body = [])
    {
        $section = explode('\\', get_called_class());
        $section = strtolower(end($section));

        $client = new Client(self::BASE_URL.$section.'/'.$url.'.json');

        $body['key'] = $this->apiKey;

        $client->setMethod(Request::METHOD_POST);
        $client->setParameterPost($body);

        try {
            $response = $client->send();
            $response = $response->getBody();
        } catch (HttpRuntimeException $e) {
            // empty response
            return;
        } catch (JsonRuntimeException $e) {
            /// invalid response
            throw new MandrillException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }

        return Json::decode($response);
    }
}
