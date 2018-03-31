<?php
/**
 * Inbound.php
 * @author based on https://github.com/jlinn/mandrill-api-php
 * @see    https://mandrillapp.com/api/docs/
 */
declare(strict_types=1);

/** @namespace */
namespace Mandrill\Api;

/**
 * Class Inbound
 * @package Mandrill\Api
 * @link    https://mandrillapp.com/api/docs/inbound.JSON.html
 */
class Inbound extends AbstractApi
{
    /**
     * List the domains that have been configured for inbound delivery.
     * @link https://mandrillapp.com/api/docs/inbound.JSON.html#method=domains
     *
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
     * List the mailbox routes defined for an inbound domain.
     * @link https://mandrillapp.com/api/docs/inbound.JSON.html#method=routes
     *
     * @param string $domain the domain to check
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function routes($domain)
    {
        return $this->request(
            'routes', [
            'domain' => $domain,
        ]);
    }

    /**
     * Take a raw MIME document destined for a domain with inbound domains set up, and send it to the inbound hook
     * exactly as if it had been sent over SMTP.
     * @link https://mandrillapp.com/api/docs/inbound.JSON.html#method=send-raw
     *
     * @param string   $rawMessage    the full MIME document of an email message
     * @param string[] $to            optionally define the recipients to receive the message - otherwise we'll use the
     *                                To, Cc, and Bcc headers provided in the document
     * @param string   $mailFrom      the address specified in the MAIL FROM stage of the SMTP conversation. Required
     *                                for the SPF check.
     * @param string   $helo          the identification provided by the client mta in the MTA state of the SMTP
     *                                conversation. Required for the SPF check.
     * @param string   $clientAddress the remote MTA's ip address. Optional; required for the SPF check.
     *
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function sendRaw($rawMessage, array $to = [], $mailFrom = null, $helo = null, $clientAddress = null)
    {
        return $this->request(
            'send-raw', [
            'raw_message'    => $rawMessage,
            'to'             => $to,
            'mail_from'      => $mailFrom,
            'helo'           => $helo,
            'client_address' => $clientAddress,
        ]);
    }
}
