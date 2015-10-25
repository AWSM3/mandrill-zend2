<?php
/**
 * Recipient.php
 * Freax, started: Oct 26, 2015 4:53:07 PM.
 *
 * @author based on https://github.com/jlinn/mandrill-api-php
 *
 * @see https://mandrillapp.com/api/docs/
 */

/**
 * @namespace
 */
namespace Mandrill\Struct;

/**
 * Class Recipient.
 */
class Recipient extends AbstractStruct
{
    const RECIPIENT_TYPE_TO = 'to';
    const RECIPIENT_TYPE_CC = 'cc';
    const RECIPIENT_TYPE_BCC = 'bcc';

    /**
     * @var string the recipient's email address
     */
    public $email;

    /**
     * @var string the recipient's name
     */
    public $name;

    /**
     * @var string the recipient's header type i.e. 'to', 'cc', 'bcc'
     */
    public $type = 'to';

    /**
     * @var array associative array of recipient-specific merge variables
     */
    protected $merge_vars = [];

    /**
     * @var array associative array of metadata
     */
    protected $metadata = [];

    /**
     * @param string $email the recipient's email address
     * @param string $name  the recipient's name
     * @param string $type  the recipient's header type i.e. 'to', 'cc', 'bcc'
     */
    public function __construct($email = null, $name = null, $type = null)
    {
        if ($email !== null) {
            $this->email = $email;
        }

        if ($name !== null) {
            $this->name = $name;
        }

        if ($type !== null) {
            $this->type = $type;
        }
    }

    /**
     * Add a merge variable to this recipient.
     *
     * @param string $name
     * @param string $content
     *
     * @return $this
     */
    public function addMergeVar($name, $content)
    {
        $this->merge_vars[] = [
            'name' => $name,
            'content' => $content,
        ];

        return $this;
    }

    /**
     * Set all merge variables for this recipient. Will overwrite any currently set merge vars.
     *
     * @param array $vars associative array
     *
     * @return $this
     */
    public function setMergeVars(array $vars)
    {
        $this->merge_vars = [];

        foreach ($vars as $name => $content) {
            $this->addMergeVar($name, $content);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getMergeVars()
    {
        return $this->merge_vars;
    }

    /**
     * Set a metadata field.
     *
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    public function addMetadata($key, $value)
    {
        $this->metadata[$key] = $value;

        return $this;
    }

    /**
     * Set all metadata for this message. Will overwrite any current metadata.
     *
     * @param array $metadata associative array
     *
     * @return $this
     */
    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
}
