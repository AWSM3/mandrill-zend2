<?php
/**
 * Urls.php
 * Freax, started: Oct 26, 2015 4:49:35 PM.
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
 * Class Urls.
 *
 * @link https://mandrillapp.com/api/docs/urls.JSON.html
 */
class Urls extends AbstractApi
{
    /**
     * Get the 100 most clicked URLs.
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/urls.JSON.html#method=list
     */
    public function listUrls()
    {
        return $this->request('list');
    }

    /**
     * Return the 100 most clicked URLs that match the search query given.
     *
     * @param string $query a search query
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/urls.JSON.html#method=search
     */
    public function search($query)
    {
        return $this->request('search', [
            'q' => $query,
        ]);
    }

    /**
     * Return the recent history (hourly stats for the last 30 days) for a url.
     *
     * @param string $url an existing URL
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/urls.JSON.html#method=time-series
     */
    public function timeSeries($url)
    {
        return $this->request('time-series', [
            'url' => $url,
        ]);
    }
}
