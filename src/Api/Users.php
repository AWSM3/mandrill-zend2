<?php
/**
 * Users.php
 * Freax, started: Oct 26, 2015 4:49:48 PM.
 *
 * @author based on https://github.com/jlinn/mandrill-api-php
 *
 * @see https://mandrillapp.com/api/docs/
 */

/**
 * @namespace
 */
namespace Mandrill\Api;

/**
 * Class Users.
 *
 * @link https://mandrillapp.com/api/docs/users.JSON.html
 */
class Users extends AbstractApi
{
    /**
     * Return information about the current API user.
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/users.JSON.html#method=info
     */
    public function info()
    {
        return $this->request('info');
    }

    /**
     * Validate an API key and respond to a ping (anal JSON parser version).
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/users.JSON.html#method=ping2
     */
    public function ping2()
    {
        return $this->request('ping2');
    }

    /**
     * Return the senders that have tried to use this account, both verified and unverified.
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/users.JSON.html#method=senders
     */
    public function senders()
    {
        return $this->request('senders');
    }
}
