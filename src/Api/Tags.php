<?php
/**
 * Tags.php
 * @author based on https://github.com/jlinn/mandrill-api-php
 * @see    https://mandrillapp.com/api/docs/
 */
declare(strict_types=1);

/** @namespace */
namespace Mandrill\Api;


/**
 * Class Tags
 * @package Mandrill\Api
 * @link    https://mandrillapp.com/api/docs/tags.JSON.html
 */
class Tags extends AbstractApi
{
    /**
     * Return all of the user-defined tag information.
     * @link https://mandrillapp.com/api/docs/tags.JSON.html#method=list
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function listTags()
    {
        return $this->request('list');
    }

    /**
     * Deletes a tag permanently. Deleting a tag removes the tag from any messages that have been sent, and also
     * deletes the tag's stats.
     * @link https://mandrillapp.com/api/docs/tags.JSON.html#method=delete
     *
     * @param string $tag a tag name
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function delete($tag)
    {
        return $this->request(
            'delete', [
            'tag' => $tag,
        ]);
    }

    /**
     * Return more detailed information about a single tag, including aggregates of recent stats.
     * @link https://mandrillapp.com/api/docs/tags.JSON.html#method=info
     *
     * @param string $tag a tag name
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function info($tag)
    {
        return $this->request(
            'info', [
            'tag' => $tag,
        ]);
    }

    /**
     * Return the recent history (hourly stats for the last 30 days) for a tag.
     *
     * @param string $tag https://mandrillapp.com/api/docs/tags.JSON.html#method=time-series
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function timeSeries($tag)
    {
        return $this->request(
            'time-series', [
            'tag' => $tag,
        ]);
    }

    /**
     * Return the recent history (hourly stats for the last 30 days) for all tags.
     * @link https://mandrillapp.com/api/docs/tags.JSON.html#method=all-time-series
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function allTimeSeries()
    {
        return $this->request('all-time-series');
    }
}
