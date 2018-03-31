<?php
/**
 * Templates.php
 * @author based on https://github.com/jlinn/mandrill-api-php
 * @see    https://mandrillapp.com/api/docs/
 */
declare(strict_types=1);

/** @namespace */
namespace Mandrill\Api;

/**
 * Class Templates
 * @package Mandrill\Api
 * @link    https://mandrillapp.com/api/docs/templates.JSON.html
 */
class Templates extends AbstractApi
{
    /**
     * Add a new template.
     * @link https://mandrillapp.com/api/docs/templates.JSON.html#method=add
     *
     * @param string $name      the name for the new template - must be unique
     * @param string $fromEmail a default sending address for emails sent using this template
     * @param string $fromName  a default from name to be used
     * @param string $subject   a default subject line to be used
     * @param string $code      the HTML code for the template with mc:edit attributes for the editable elements
     * @param string $text      a default text part to be used when sending with this template
     * @param bool   $publish   set to false to add a draft template without publishing
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function add($name, $fromEmail = null, $fromName = null, $subject = null, $code = null, $text = null,
                        $publish = true)
    {
        return $this->request(
            'add', [
            'name'       => $name,
            'from_email' => $fromEmail,
            'from_name'  => $fromName,
            'subject'    => $subject,
            'code'       => $code,
            'text'       => $text,
            'publish'    => $publish,
        ]);
    }

    /**
     * Get the information for an existing template.
     * @link https://mandrillapp.com/api/docs/templates.JSON.html#method=info
     *
     * @param string $name the immutable name of an existing template
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function info($name)
    {
        return $this->request(
            'info', [
            'name' => $name,
        ]);
    }

    /**
     * Update the code for an existing template. If null is provided for any fields, the values will remain unchanged.
     * @link https://mandrillapp.com/api/docs/templates.JSON.html#method=update
     *
     * @param string $name      the immutable name of an existing template
     * @param string $fromEmail a default sending address for emails sent using this template
     * @param string $fromName  a default from name to be used
     * @param string $subject   a default subject line to be used
     * @param string $code      the HTML code for the template with mc:edit attributes for the editable elements
     * @param string $text      a default text part to be used when sending with this template
     * @param bool   $publish   set to false to update the draft version of the template without publishing
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function update($name, $fromEmail = null, $fromName = null, $subject = null, $code = null, $text = null,
                           $publish = true)
    {
        return $this->request(
            'update', [
            'name'       => $name,
            'from_email' => $fromEmail,
            'from_name'  => $fromName,
            'subject'    => $subject,
            'code'       => $code,
            'text'       => $text,
            'publish'    => $publish,
        ]);
    }

    /**
     * Publish the content for the template. Any new messages sent using this template will start using the content
     * that was previously in draft.
     * @link https://mandrillapp.com/api/docs/templates.JSON.html#method=publish
     *
     * @param string $name the immutable name of an existing template
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function publish($name)
    {
        return $this->request(
            'publish', [
            'name' => $name,
        ]);
    }

    /**
     * Delete a template.
     * @link https://mandrillapp.com/api/docs/templates.JSON.html#method=delete
     *
     * @param string $name the immutable name of an existing template
     *
     * @return array
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     */
    public function delete($name)
    {
        return $this->request(
            'delete', [
            'name' => $name,
        ]);
    }

    /**
     * Return a list of all the templates available to this user.
     * @link https://mandrillapp.com/api/docs/templates.JSON.html#method=list
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function listTemplates()
    {
        return $this->request('list');
    }

    /**
     * Return the recent history (hourly stats for the last 30 days) for a template.
     * @link https://mandrillapp.com/api/docs/templates.JSON.html#method=time-series
     *
     * @param string $name the name of an existing template
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function timeSeries($name)
    {
        return $this->request(
            'time-series', [
            'name' => $name,
        ]);
    }

    /**
     * Inject content and optionally merge fields into a template, returning the HTML that results.
     * @link https://mandrillapp.com/api/docs/templates.JSON.html#method=render
     *
     * @param string $name            the immutable name of a template that exists in the user's account
     * @param array  $templateContent array(array('name' => 'example_name', 'content' => 'example_content'))
     * @param array  $mergeVars       array(array('name' => 'example_name', 'content' => 'example_content'))
     *
     * @throws Mandrill\Exception\EmptyResponseException
     * @throws Mandrill\Exception\InvalidResponseFormatException
     * @return array
     */
    public function render($name, array $templateContent = [], array $mergeVars = [])
    {
        return $this->request(
            'render', [
            'template_name'    => $name,
            'template_content' => $templateContent,
            'merge_vars'       => $mergeVars,
        ]);
    }
}
