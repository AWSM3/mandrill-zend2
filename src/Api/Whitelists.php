<?php
/**
 * Whitelists.php
 * @author based on https://github.com/jlinn/mandrill-api-php
 * @see    https://mandrillapp.com/api/docs/
 */
declare(strict_types=1);

/** @namespace */
namespace Mandrill\Api;

/**
 * Class Whitelists
 * @package Mandrill\Api
 * @link    https://mandrillapp.com/api/docs/whitelists.JSON.html
 */
class Whitelists extends AbstractApi
{
    /**
     * Adds an email to your email rejection whitelist. If the address is currently on your blacklist, that blacklist
     * entry will be removed automatically.
     * @link https://mandrillapp.com/api/docs/whitelists.JSON.html#method=add
     *
     * @param string $email an email address to add to the whitelist
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function add($email)
    {
        return $this->request(
            'add', [
            'email' => $email,
        ]);
    }

    /**
     * Retrieves your email rejection whitelist.
     * @link https://mandrillapp.com/api/docs/whitelists.JSON.html#method=list
     *
     * @param string $email an optional email address or prefix to search by
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function listWhitelists($email = null)
    {
        return $this->request(
            'list', [
            'email' => $email,
        ]);
    }

    /**
     * Removes an email address from the whitelist.
     * @link https://mandrillapp.com/api/docs/whitelists.JSON.html#method=delete
     *
     * @param string $email the email address to remove from the whitelist
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function delete($email)
    {
        return $this->request(
            'delete', [
            'email' => $email,
        ]);
    }
}
