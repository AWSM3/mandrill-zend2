<?php
/**
 * Tags.php
 * Freax, started: Oct 26, 2015 4:49:23 PM.
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
 * Class Tags.
 *
 * @link https://mandrillapp.com/api/docs/tags.JSON.html
 */
class Tags extends AbstractApi
{
    /**
     * Return all of the user-defined tag information.
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/tags.JSON.html#method=list
     */
    public function listTags()
    {
        return $this->request('list');
    }

    /**
     * Deletes a tag permanently. Deleting a tag removes the tag from any messages that have been sent, and also deletes the tag's stats.
     *
     * @param string $tag a tag name
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/tags.JSON.html#method=delete
     */
    public function delete($tag)
    {
        return $this->request('delete', [
            'tag' => $tag,
        ]);
    }

    /**
     * Return more detailed information about a single tag, including aggregates of recent stats.
     *
     * @param string $tag a tag name
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/tags.JSON.html#method=info
     */
    public function info($tag)
    {
        return $this->request('info', [
            'tag' => $tag,
        ]);
    }

    /**
     * Return the recent history (hourly stats for the last 30 days) for a tag.
     *
     * @param string $tag https://mandrillapp.com/api/docs/tags.JSON.html#method=time-series
     *
     * @return array
     */
    public function timeSeries($tag)
    {
        return $this->request('time-series', [
            'tag' => $tag,
        ]);
    }

    /**
     * Return the recent history (hourly stats for the last 30 days) for all tags.
     *
     * @return array
     * @linkhttps://mandrillapp.com/api/docs/tags.JSON.html#method=all-time-series
     */
    public function allTimeSeries()
    {
        return $this->request('all-time-series');
    }
}
