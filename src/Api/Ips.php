<?php
/**
 * Ips.php
 * @author based on https://github.com/jlinn/mandrill-api-php
 * @see    https://mandrillapp.com/api/docs/
 */
declare(strict_types=1);

/** @namespace */
namespace Mandrill\Api;


/**
 * Class Ips
 * @package Mandrill\Api
 * @link    https://mandrillapp.com/api/docs/ips.JSON.html
 */
class Ips extends AbstractApi
{
    /**
     * Lists your dedicated IPs.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=list
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function listIps()
    {
        return $this->request('list');
    }

    /**
     * Retrieves information about a single dedicated ip.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=info
     *
     * @param string $ip a dedicated IP address
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function info($ip)
    {
        return $this->request(
            'info', [
            'ip' => $ip,
        ]);
    }

    /**
     * Requests an additional dedicated IP for your account. Accounts may have one outstanding request at any time, and
     * provisioning requests are processed within 24 hours.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=provision
     *
     * @param bool   $warmup whether to enable warmup mode for the ip
     * @param string $pool   the id of the pool to add the dedicated ip to, or null to use your account's default pool
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function provision($warmup = false, $pool = null)
    {
        return $this->request(
            'provision', [
            'warmup' => $warmup,
            'pool'   => $pool,
        ]);
    }

    /**
     * Begins the warmup process for a dedicated IP.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=start-warmup
     *
     * @param string $ip a dedicated ip address
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function startWarmup($ip)
    {
        return $this->request(
            'start-warmup', [
            'ip' => $ip,
        ]);
    }

    /**
     * Cancels the warmup process for a dedicated IP.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=cancel-warmup
     *
     * @param string $ip a dedicated ip address
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function cancelWarmup($ip)
    {
        return $this->request(
            'cancel-warmup', [
            'ip' => $ip,
        ]);
    }

    /**
     * Moves a dedicated IP to a different pool.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=set-pool
     *
     * @param string $ip         a dedicated ip address
     * @param string $pool       the name of the new pool to add the dedicated ip to
     * @param bool   $createPool whether to create the pool if it does not exist; if false and the pool does not exist,
     *                           an Unknown_Pool will be thrown.
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function setPool($ip, $pool, $createPool = false)
    {
        return $this->request(
            'set-pool', [
            'ip'          => $ip,
            'pool'        => $pool,
            'create_pool' => $createPool,
        ]);
    }

    /**
     * Deletes a dedicated IP. This is permanent and cannot be undone.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=delete
     *
     * @param string $ip a dedicated ip address
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function delete($ip)
    {
        return $this->request(
            'delete', [
            'ip' => $ip,
        ]);
    }

    /**
     * Lists your dedicated IP pools.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=list-pools
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function listPools()
    {
        return $this->request('list-pools');
    }

    /**
     * Describes a single dedicated IP pool.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=pool-info
     *
     * @param string $pool a pool name
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function poolInfo($pool)
    {
        return $this->request(
            'pool-info', [
            'pool' => $pool,
        ]);
    }

    /**
     * Creates a pool and returns it. If a pool already exists with this name, no action will be performed.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=create-pool
     *
     * @param string $pool the name of a pool to create
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function createPool($pool)
    {
        return $this->request(
            'create-pool', [
            'pool' => $pool,
        ]);
    }

    /**
     * Deletes a pool. A pool must be empty before you can delete it, and you cannot delete your default pool.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=delete-pool
     *
     * @param string $pool the name of the pool to delete
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function deletePool($pool)
    {
        return $this->request(
            'delete-pool', [
            'pool' => $pool,
        ]);
    }

    /**
     * https://mandrillapp.com/api/docs/ips.JSON.html#method=check-custom-dns.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=check-custom-dns
     *
     * @param string $ip     a dedicated ip address
     * @param string $domain the domain name to test
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function checkCustomDNS($ip, $domain)
    {
        return $this->request(
            'check-custom-dns', [
            'ip'     => $ip,
            'domain' => $domain,
        ]);
    }

    /**
     * Configures the custom DNS name for a dedicated IP.
     * @link https://mandrillapp.com/api/docs/ips.JSON.html#method=set-custom-dns
     *
     * @param string $ip     a dedicated ip address
     * @param string $domain a domain name to set as the dedicated IP's custom dns name.
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function setCustomDNS($ip, $domain)
    {
        return $this->request(
            'set-custom-dns', [
            'ip'     => $ip,
            'domain' => $domain,
        ]);
    }
}
