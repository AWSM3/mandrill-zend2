<?php
/**
 * Subaccounts.php
 * Freax, started: Oct 26, 2015 4:49:17 PM.
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
 * Class Subaccounts.
 *
 * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html
 */
class Subaccounts extends AbstractApi
{
    /**
     * Get the list of subaccounts defined for the account, optionally filtered by a prefix.
     *
     * @param string $query an optional prefix to filter the subaccounts' ids and names
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=list
     */
    public function listSubaccounts($query = null)
    {
        return $this->request('list', [
            'q' => $query,
        ]);
    }

    /**
     * Add a new subaccount.
     *
     * @param string $id          a unique identifier for the subaccount to be used in sending calls
     * @param string $name        an optional display name to further identify the subaccount
     * @param string $notes       optional extra text to associate with the subaccount
     * @param int    $customQuota an optional manual hourly quota for the subaccount. If not specified, Mandrill will manage this based on reputation.
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=add
     */
    public function add($id, $name = null, $notes = null, $customQuota = null)
    {
        return $this->request('add', [
            'id' => $id,
            'name' => $name,
            'notes' => $notes,
            'custom_quota' => $customQuota,
        ]);
    }

    /**
     * Given the ID of an existing subaccount, return the data about it.
     *
     * @param string $id the unique identifier of the subaccount to query
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=info
     */
    public function info($id)
    {
        return $this->request('info', [
            'id' => $id,
        ]);
    }

    /**
     * Update an existing subaccount.
     *
     * @param string $id          he unique identifier of the subaccount to update
     * @param string $name        an optional display name to further identify the subaccount
     * @param string $notes       optional extra text to associate with the subaccount
     * @param int    $customQuota an optional manual hourly quota for the subaccount. If not specified, Mandrill will manage this based on reputation
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=update
     */
    public function update($id, $name = null, $notes = null, $customQuota = null)
    {
        return $this->request('update', [
            'id' => $id,
            'name' => $name,
            'notes' => $notes,
            'custom_quota' => $customQuota,
        ]);
    }

    /**
     * Delete an existing subaccount. Any email related to the subaccount will be saved, but stats will be removed and any future sending calls to this subaccount will fail.
     *
     * @param string $id the unique identifier of the subaccount to delete
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=delete
     */
    public function delete($id)
    {
        return $this->request('delete', [
            'id' => $id,
        ]);
    }

    /**
     * Pause a subaccount's sending. Any future emails delivered to this subaccount will be queued for a maximum of 3 days until the subaccount is resumed.
     *
     * @param string $id the unique identifier of the subaccount to pause
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=pause
     */
    public function pause($id)
    {
        return $this->request('pause', [
            'id' => $id,
        ]);
    }

    /**
     * Resume a paused subaccount's sending.
     *
     * @param string $id the unique identifier of the subaccount to resume
     *
     * @return array
     *
     * @link https://mandrillapp.com/api/docs/subaccounts.JSON.html#method=resume
     */
    public function resume($id)
    {
        return $this->request('resume', [
            'id' => $id,
        ]);
    }
}
