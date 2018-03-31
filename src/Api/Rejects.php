<?php
/**
 * Rejects.php
 * @author based on https://github.com/jlinn/mandrill-api-php
 * @see    https://mandrillapp.com/api/docs/
 */
declare(strict_types=1);

/** @namespace */
namespace Mandrill\Api;


/**
 * Class Rejects
 * @package Mandrill\Api
 * @link    https://mandrillapp.com/api/docs/rejects.JSON.html
 */
class Rejects extends AbstractApi
{
    /**
     * Adds an email to your email rejection blacklist.
     * @link https://mandrillapp.com/api/docs/rejects.JSON.html#method=add
     *
     * @param string $email      an email address to block
     * @param string $comment    an optional comment describing the rejection
     * @param string $subaccount an optional unique identifier for the subaccount to limit the blacklist entry
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function add($email, $comment = null, $subaccount = null)
    {
        return $this->request(
            'add', [
            'email'      => $email,
            'comment'    => $comment,
            'subaccount' => $subaccount,
        ]);
    }

    /**
     * Retrieves your email rejection blacklist.
     * @link https://mandrillapp.com/api/docs/rejects.JSON.html#method=list
     *
     * @param string $email          an optional email address to search by
     * @param bool   $includeExpired whether to include rejections that have already expired.
     * @param string $subaccount     an optional unique identifier for the subaccount to limit the blacklist
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function listRejects($email = null, $includeExpired = false, $subaccount = null)
    {
        return $this->request(
            'list', [
            'email'           => $email,
            'include_expired' => $includeExpired,
            'subaccount'      => $subaccount,
        ]);
    }

    /**
     * Deletes an email rejection.
     * @link https://mandrillapp.com/api/docs/rejects.JSON.html#method=delete
     *
     * @param      $email      string An email address
     * @param null $subaccount an optional unique identifier for the subaccount to limit the blacklist deletion
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function delete($email, $subaccount = null)
    {
        return $this->request(
            'delete', [
            'email'      => $email,
            'subaccount' => $subaccount,
        ]);
    }
}
