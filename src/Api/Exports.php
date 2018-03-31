<?php
/**
 * Exports.php
 * @author based on https://github.com/jlinn/mandrill-api-php
 * @see    https://mandrillapp.com/api/docs/
 */
declare(strict_types=1);

/** @namespace */
namespace Mandrill\Api;

/**
 * Class Exports.
 *
 * @link https://mandrillapp.com/api/docs/exports.JSON.html
 */
class Exports extends AbstractApi
{
    /**
     * Returns information about an export job. If the export job's state is 'complete', the returned data will include
     * a URL you can use to fetch the results.
     * @link https://mandrillapp.com/api/docs/exports.JSON.html
     *
     * @param string $id an export job identifier
     *
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
     * Returns a list of your exports.
     * @link https://mandrillapp.com/api/docs/exports.JSON.html#method=list
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function listExports()
    {
        return $this->request('list');
    }

    /**
     * Begins an export of your rejection blacklist.
     * @link https://mandrillapp.com/api/docs/exports.JSON.html#method=rejects
     *
     * @param string $notifyEmail an optional email address to notify when the export job has finished.
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function rejects($notifyEmail = null)
    {
        return $this->request(
            'rejects', [
            'notify_email' => $notifyEmail,
        ]);
    }

    /**
     * Begins an export of your rejection whitelist.
     * @link https://mandrillapp.com/api/docs/exports.JSON.html#method=whitelist
     *
     * @param string $notifyEmail an optional email address to notify when the export job has finished.
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function whitelist($notifyEmail = null)
    {
        return $this->request(
            'rejects', [
            'notify_email' => $notifyEmail,
        ]);
    }

    /**
     * Begins an export of your activity history.
     * @link https://mandrillapp.com/api/docs/exports.JSON.html#method=activity
     *
     * @param string   $notifyEmail an optional email address to notify when the export job has finished
     * @param string   $dateFrom    start date as a UTC string in YYYY-MM-DD HH:MM:SS format
     * @param string   $dateTo      end date as a UTC string in YYYY-MM-DD HH:MM:SS format
     * @param string[] $tags        an array of tag names to narrow the export to; will match messages that contain ANY
     *                              of the tags
     * @param string[] $senders     an array of senders to narrow the export to
     * @param string[] $states      an array of states to narrow the export to; messages with ANY of the states will be
     *                              included
     * @param string[] $apiKeys     an array of api keys to narrow the export to; messsagse sent with ANY of the keys
     *                              will be included
     *
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function activity($notifyEmail = null, $dateFrom = null, $dateTo = null, array $tags = [],
                             array $senders = [], array $states = [], array $apiKeys = [])
    {
        return $this->request(
            'activity', [
            'notify_email' => $notifyEmail,
            'date_from'    => $dateFrom,
            'date_to'      => $dateTo,
            'tags'         => $tags,
            'senders'      => $senders,
            'states'       => $states,
            'api_keys'     => $apiKeys,
        ]);
    }
}
