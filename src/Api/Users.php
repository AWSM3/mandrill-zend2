<?php
/**
 * Users.php
 * @author based on https://github.com/jlinn/mandrill-api-php
 * @see    https://mandrillapp.com/api/docs/
 */
declare(strict_types=1);

/** @namespace */
namespace Mandrill\Api;

/**
 * Class Users
 * @package Mandrill\Api
 * @link    https://mandrillapp.com/api/docs/users.JSON.html
 */
class Users extends AbstractApi
{
    /**
     * Return information about the current API user.
     * @link https://mandrillapp.com/api/docs/users.JSON.html#method=info
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function info()
    {
        return $this->request('info');
    }

    /**
     * Validate an API key and respond to a ping (anal JSON parser version).
     * @link https://mandrillapp.com/api/docs/users.JSON.html#method=ping2
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function ping2()
    {
        return $this->request('ping2');
    }

    /**
     * Return the senders that have tried to use this account, both verified and unverified.
     * @link https://mandrillapp.com/api/docs/users.JSON.html#method=senders
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function senders()
    {
        return $this->request('senders');
    }
}
