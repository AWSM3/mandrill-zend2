<?php
/**
 * Exports.php
 * Freax, started: Oct 26, 2015 4:45:44 PM.
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
 * Class Exports.
 *
 * @link https://mandrillapp.com/api/docs/exports.JSON.html
 */
class Exports extends AbstractApi
{
    /**
     * Returns information about an export job. If the export job's state is 'complete', the returned data will include a URL you can use to fetch the results.
     *
     * @param string $id an export job identifier
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/exports.JSON.html
     */
    public function info($id)
    {
        return $this->request('info', [
            'id' => $id,
        ]);
    }

    /**
     * Returns a list of your exports.
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/exports.JSON.html#method=list
     */
    public function listExports()
    {
        return $this->request('list');
    }

    /**
     * Begins an export of your rejection blacklist.
     *
     * @param string $notifyEmail an optional email address to notify when the export job has finished.
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/exports.JSON.html#method=rejects
     */
    public function rejects($notifyEmail = null)
    {
        return $this->request('rejects', [
            'notify_email' => $notifyEmail,
        ]);
    }

    /**
     * Begins an export of your rejection whitelist.
     *
     * @param string $notifyEmail an optional email address to notify when the export job has finished.
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/exports.JSON.html#method=whitelist
     */
    public function whitelist($notifyEmail = null)
    {
        return $this->request('rejects', [
            'notify_email' => $notifyEmail,
        ]);
    }

    /**
     * Begins an export of your activity history.
     *
     * @param string   $notifyEmail an optional email address to notify when the export job has finished
     * @param string   $dateFrom    start date as a UTC string in YYYY-MM-DD HH:MM:SS format
     * @param string   $dateTo      end date as a UTC string in YYYY-MM-DD HH:MM:SS format
     * @param string[] $tags        an array of tag names to narrow the export to; will match messages that contain ANY of the tags
     * @param string[] $senders     an array of senders to narrow the export to
     * @param string[] $states      an array of states to narrow the export to; messages with ANY of the states will be included
     * @param string[] $apiKeys     an array of api keys to narrow the export to; messsagse sent with ANY of the keys will be included
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/exports.JSON.html#method=activity
     */
    public function activity($notifyEmail = null, $dateFrom = null, $dateTo = null, array $tags = [], array $senders = [], array $states = [], array $apiKeys = [])
    {
        return $this->request('activity', [
            'notify_email' => $notifyEmail,
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
            'tags' => $tags,
            'senders' => $senders,
            'states' => $states,
            'api_keys' => $apiKeys,
        ]);
    }
}
