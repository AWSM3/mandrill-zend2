<?php
/**
 * Webhooks.php
 * Freax, started: Oct 26, 2015 4:49:54 PM.
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
 * Class Webhooks.
 *
 * @link https://mandrillapp.com/api/docs/webhooks.JSON.html
 */
class Webhooks extends AbstractApi
{
    /**
     * Get the list of all webhooks defined on the account.
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/webhooks.JSON.html#method=list
     */
    public function listWebhooks()
    {
        return $this->request('list');
    }

    /**
     * Add a new webhook.
     *
     * @param string   $url         the URL to POST batches of events
     * @param string   $description an optional description of the webhook
     * @param string[] $events      an optional list of events that will be posted to the webhook
     *                              valid events: send, hard_bounce, soft_bounce, open, click, spam, unsub, reject
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/webhooks.JSON.html#method=add
     */
    public function add($url, $description = null, array $events = [])
    {
        return $this->request('add', [
            'url' => $url,
            'description' => $description,
            'events' => $events,
        ]);
    }

    /**
     * Given the ID of an existing webhook, return the data about it.
     *
     * @param int $id the unique identifier of a webhook belonging to this account
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/webhooks.JSON.html#method=info
     */
    public function info($id)
    {
        return $this->request('info', [
            'id' => $id,
        ]);
    }

    /**
     * Update an existing webhook.
     *
     * @param int      $id          the unique identifier of a webhook belonging to this account
     * @param string   $url         the URL to POST batches of events
     * @param string   $description an optional description of the webhook
     * @param string[] $events      an optional list of events that will be posted to the webhook
     *                              valid events: send, hard_bounce, soft_bounce, open, click, spam, unsub, reject
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/webhooks.JSON.html#method=update
     */
    public function update($id, $url, $description = null, array $events = [])
    {
        return $this->request('update', [
            'id' => $id,
            'url' => $url,
            'description' => $description,
            'events' => $events,
        ]);
    }

    /**
     * Delete an existing webhook.
     *
     * @param int $id the unique identifier of a webhook belonging to this account
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/webhooks.JSON.html#method=delete
     */
    public function delete($id)
    {
        return $this->request('delete', [
            'id' => $id,
        ]);
    }
}
