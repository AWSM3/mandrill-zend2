<?php
/**
 * Senders.php
 * @author based on https://github.com/jlinn/mandrill-api-php
 * @see    https://mandrillapp.com/api/docs/
 */
declare(strict_types=1);

/** @namespace */
namespace Mandrill\Api;

/**
 * Class Senders
 * @package Mandrill\Api
 * @link    https://mandrillapp.com/api/docs/senders.JSON.html
 */
class Senders extends AbstractApi
{
    /**
     * Return the senders that have tried to use this account.
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=list
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function listSenders()
    {
        return $this->request('list');
    }

    /**
     * Returns the sender domains that have been added to this account.
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=domains
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function domains()
    {
        return $this->request('domains');
    }

    /**
     * Adds a sender domain to your account. Sender domains are added automatically as you send, but you can use this
     * call to add them ahead of time.
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=add-domain
     *
     * @param string $domain domain name
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function addDomain($domain)
    {
        return $this->request(
            'add-domain', [
            'domain' => $domain,
        ]);
    }

    /**
     * Checks the SPF and DKIM settings for a domain. If you haven't already added this domain to your account, it will
     * be added automatically.
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=check-domain
     *
     * @param string $domain domain name
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function checkDomain($domain)
    {
        return $this->request(
            'check-domain', [
            'domain' => $domain,
        ]);
    }

    /**
     * Sends a verification email in order to verify ownership of a domain.
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=verify-domain
     *
     * @param string $domain  a domain name at which you can receive email
     * @param string $mailbox a mailbox at the domain where the verification email should be sent
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function verifyDomain($domain, $mailbox)
    {
        return $this->request(
            'verify-domain', [
            'domain'  => $domain,
            'mailbox' => $mailbox,
        ]);
    }

    /**
     * Return more detailed information about a single sender, including aggregates of recent stats.
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=info
     *
     * @param string $address the email address of the sender
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function info($address)
    {
        return $this->request(
            'info', [
            'address' => $address,
        ]);
    }

    /**
     * Return the recent history (hourly stats for the last 30 days) for a sender.
     * @link https://mandrillapp.com/api/docs/senders.JSON.html#method=time-series
     *
     * @param string $address the email address of the sender
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function timeSeries($address)
    {
        return $this->request(
            'time-series', [
            'address' => $address,
        ]);
    }
}
