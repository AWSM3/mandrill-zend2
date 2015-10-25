<?php
/**
 * Rejects.php
 * Freax, started: Oct 26, 2015 4:48:59 PM.
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
 * Class Rejects.
 *
 * @link https://mandrillapp.com/api/docs/rejects.JSON.html
 */
class Rejects extends AbstractApi
{
    /**
     * Adds an email to your email rejection blacklist.
     *
     * @param string $email      an email address to block
     * @param string $comment    an optional comment describing the rejection
     * @param string $subaccount an optional unique identifier for the subaccount to limit the blacklist entry
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/rejects.JSON.html#method=add
     */
    public function add($email, $comment = null, $subaccount = null)
    {
        return $this->request('add', [
            'email' => $email,
            'comment' => $comment,
            'subaccount' => $subaccount,
        ]);
    }

    /**
     * Retrieves your email rejection blacklist.
     *
     * @param string $email          an optional email address to search by
     * @param bool   $includeExpired whether to include rejections that have already expired.
     * @param string $subaccount     an optional unique identifier for the subaccount to limit the blacklist
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/rejects.JSON.html#method=list
     */
    public function listRejects($email = null, $includeExpired = false, $subaccount = null)
    {
        return $this->request('list', [
            'email' => $email,
            'include_expired' => $includeExpired,
            'subaccount' => $subaccount,
        ]);
    }

    /**
     * Deletes an email rejection.
     *
     * @param $email an email address
     * @param null $subaccount an optional unique identifier for the subaccount to limit the blacklist deletion
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/rejects.JSON.html#method=delete
     */
    public function delete($email, $subaccount = null)
    {
        return $this->request('delete', [
            'email' => $email,
            'subaccount' => $subaccount,
        ]);
    }
}
