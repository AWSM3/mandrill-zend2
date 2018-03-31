<?php
/**
 * Urls.php
 * @author based on https://github.com/jlinn/mandrill-api-php
 * @see    https://mandrillapp.com/api/docs/
 */
declare(strict_types=1);

/** @namespace */
namespace Mandrill\Api;

/**
 * Class Urls
 * @package Mandrill\Api
 * @link    https://mandrillapp.com/api/docs/urls.JSON.html
 */
class Urls extends AbstractApi
{
    /**
     * Get the 100 most clicked URLs.
     * @link https://mandrillapp.com/api/docs/urls.JSON.html#method=list
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function listUrls()
    {
        return $this->request('list');
    }

    /**
     * Return the 100 most clicked URLs that match the search query given.
     * @link https://mandrillapp.com/api/docs/urls.JSON.html#method=search
     *
     * @param string $query a search query
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function search($query)
    {
        return $this->request(
            'search', [
            'q' => $query,
        ]);
    }

    /**
     * Return the recent history (hourly stats for the last 30 days) for a url.
     * @link https://mandrillapp.com/api/docs/urls.JSON.html#method=time-series
     *
     * @param string $url an existing URL
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function timeSeries($url)
    {
        return $this->request(
            'time-series', [
            'url' => $url,
        ]);
    }
}
