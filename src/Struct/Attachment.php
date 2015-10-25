<?php
/**
 * Attachment.php
 * Freax, started: Oct 26, 2015 4:52:56 PM.
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
 * Class Attachment.
 */
class Attachment extends AbstractStruct
{
    /**
     * @var string the MIME type of the attachment
     */
    public $type;

    /**
     * @var string the file name of the attachment
     */
    public $name;

    /**
     * @var string the content of the attachment as a base64-encoded string
     */
    public $content;
}
