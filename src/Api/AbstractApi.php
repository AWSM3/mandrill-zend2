<?php
/**
 * AbstractApi.php
 * @author based on https://github.com/jlinn/mandrill-api-php
 * @see    https://mandrillapp.com/api/docs/
 */
declare(strict_types=1);

/** @namespace */
namespace Mandrill\Api;

/* @uses */
use Mandrill\Exception\EmptyResponseException;
use Mandrill\Exception\InvalidResponseFormatException;
use Zend\Http\Client;
use Zend\Http\Exception\RuntimeException as HttpRuntimeException;
use Zend\Http\Request;
use Zend\Json\Exception\RuntimeException as JsonRuntimeException;
use Zend\Json\Json;

/**
 * Class AbstractApi
 * @package Mandrill\Api
 */
abstract class AbstractApi
{
    const
        BASE_URL = 'https://mandrillapp.com/api/1.0/';

    /** @var string Mandrill API key */
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
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     *
     * @return array
     */
    protected function request($url, array $body = [])
    {
        $section = explode('\\', get_called_class());
        $section = strtolower(end($section));

        $client = new Client(self::BASE_URL . $section . '/' . $url . '.json');

        $body['key'] = $this->apiKey;

        $client->setMethod(Request::METHOD_POST);
        $client->setParameterPost($body);

        $return = null;

        try {
            $response = $client->send()->getBody();
            $return = Json::decode($response);
        } catch (HttpRuntimeException $e) {
            // empty response
            throw new EmptyResponseException('Response is empty, service unavailable.');
        } catch (JsonRuntimeException $e) {
            // invalid response
            throw new InvalidResponseFormatException('Response must be in valid json format.');
        }

        return $return;
    }
}
