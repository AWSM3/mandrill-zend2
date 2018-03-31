<?php
/**
 * Webhooks.php
 * @author based on https://github.com/jlinn/mandrill-api-php
 * @see    https://mandrillapp.com/api/docs/
 */
declare(strict_types=1);

/** @namespace */
namespace Mandrill\Api;

/**
 * Class Webhooks
 * @package Mandrill\Api
 * @link    https://mandrillapp.com/api/docs/webhooks.JSON.html
 */
class Webhooks extends AbstractApi
{
    /**
     * Get the list of all webhooks defined on the account.
     * @link https://mandrillapp.com/api/docs/webhooks.JSON.html#method=list
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function listWebhooks()
    {
        return $this->request('list');
    }

    /**
     * Add a new webhook.
     * @link https://mandrillapp.com/api/docs/webhooks.JSON.html#method=add
     *
     * @param string   $url         the URL to POST batches of events
     * @param string   $description an optional description of the webhook
     * @param string[] $events      an optional list of events that will be posted to the webhook
     *                              valid events: send, hard_bounce, soft_bounce, open, click, spam, unsub, reject
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function add($url, $description = null, array $events = [])
    {
        return $this->request(
            'add', [
            'url'         => $url,
            'description' => $description,
            'events'      => $events,
        ]);
    }

    /**
     * Given the ID of an existing webhook, return the data about it.
     * @link https://mandrillapp.com/api/docs/webhooks.JSON.html#method=info
     *
     * @param int $id the unique identifier of a webhook belonging to this account
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function info($id)
    {
        return $this->request(
            'info', [
            'id' => $id,
        ]);
    }

    /**
     * Update an existing webhook.
     * @link https://mandrillapp.com/api/docs/webhooks.JSON.html#method=update
     *
     * @param int      $id          the unique identifier of a webhook belonging to this account
     * @param string   $url         the URL to POST batches of events
     * @param string   $description an optional description of the webhook
     * @param string[] $events      an optional list of events that will be posted to the webhook
     *                              valid events: send, hard_bounce, soft_bounce, open, click, spam, unsub, reject
     *
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function update($id, $url, $description = null, array $events = [])
    {
        return $this->request(
            'update', [
            'id'          => $id,
            'url'         => $url,
            'description' => $description,
            'events'      => $events,
        ]);
    }

    /**
     * Delete an existing webhook.
     * @link https://mandrillapp.com/api/docs/webhooks.JSON.html#method=delete
     *
     * @param int $id the unique identifier of a webhook belonging to this account
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function delete($id)
    {
        return $this->request(
            'delete', [
            'id' => $id,
        ]);
    }
}
