<?php
/**
 * Mandrill.php
 * Freax, started: Oct 26, 2015 4:53:20 PM.
 *
 * @author based on https://github.com/jlinn/mandrill-api-php
 *
 * @see https://mandrillapp.com/api/docs/
 */

/**
 * @namespace
 */
namespace Mandrill;

/**
 * Class Mandrill.
 */
class Mandrill
{
    /**
     * @var Api\Users
     */
    protected $users;

    /**
     * @var Api\Messages
     */
    protected $messages;

    /**
     * @var Api\Tags
     */
    protected $tags;

    /**
     * @var Api\Rejects
     */
    protected $rejects;

    /**
     * @var Api\Whitelists
     */
    protected $whitelists;

    /**
     * @var Api\Senders
     */
    protected $senders;

    /**
     * @var Api\Urls
     */
    protected $urls;

    /**
     * @var Api\Templates
     */
    protected $templates;

    /**
     * @var Api\Webhooks
     */
    protected $webhooks;

    /**
     * @var Api\Subaccounts
     */
    protected $subaccounts;

    /**
     * @var Api\Inbound
     */
    protected $inbound;

    /**
     * @var Api\Exports
     */
    protected $exports;

    /**
     * @var Api\Ips
     */
    protected $ips;

    /**
     * @var string Mandrill API key
     */
    private $apiKey;

    /**
     * @param string $apiKey Mandrill API key
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return Api\Users
     */
    public function users()
    {
        if ($this->users === null) {
            $this->users = new Api\Users($this->apiKey);
        }

        return $this->users;
    }

    /**
     * @return Api\Messages
     */
    public function messages()
    {
        if ($this->messages === null) {
            $this->messages = new Api\Messages($this->apiKey);
        }

        return $this->messages;
    }

    /**
     * @return Api\Tags
     */
    public function tags()
    {
        if ($this->tags === null) {
            $this->tags = new Api\Tags($this->apiKey);
        }

        return $this->tags;
    }

    /**
     * @return Api\Rejects
     */
    public function rejects()
    {
        if ($this->rejects === null) {
            $this->rejects = new Api\Rejects($this->apiKey);
        }

        return $this->rejects;
    }

    /**
     * @return Api\Whitelists
     */
    public function whitelists()
    {
        if ($this->whitelists === null) {
            $this->whitelists = new Api\Whitelists($this->apiKey);
        }

        return $this->whitelists;
    }

    /**
     * @return Api\Senders
     */
    public function senders()
    {
        if ($this->senders === null) {
            $this->senders = new Api\Senders($this->apiKey);
        }

        return $this->senders;
    }

    /**
     * @return Api\Urls
     */
    public function urls()
    {
        if ($this->urls === null) {
            $this->urls = new Api\Urls($this->apiKey);
        }

        return $this->urls;
    }

    /**
     * @return Api\Templates
     */
    public function templates()
    {
        if ($this->templates === null) {
            $this->templates = new Api\Templates($this->apiKey);
        }

        return $this->templates;
    }

    /**
     * @return Api\Webhooks
     */
    public function webhooks()
    {
        if ($this->webhooks === null) {
            $this->webhooks = new Api\Webhooks($this->apiKey);
        }

        return $this->webhooks;
    }

    /**
     * @return Api\Subaccounts
     */
    public function subaccounts()
    {
        if ($this->subaccounts === null) {
            $this->subaccounts = new Api\Subaccounts($this->apiKey);
        }

        return $this->subaccounts;
    }

    /**
     * @return Api\Inbound
     */
    public function inbound()
    {
        if ($this->inbound === null) {
            $this->inbound = new Api\Inbound($this->apiKey);
        }

        return $this->inbound;
    }

    /**
     * @return Api\Exports
     */
    public function exports()
    {
        if ($this->exports === null) {
            $this->exports = new Api\Exports($this->apiKey);
        }

        return $this->exports;
    }

    /**
     * @return Api\Ips
     */
    public function ips()
    {
        if ($this->ips === null) {
            $this->ips = new Api\Ips($this->apiKey);
        }

        return $this->ips;
    }
}
