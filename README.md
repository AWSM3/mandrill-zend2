Mandrill API for Zend Framework 2 (>=2.5)
================

A PHP ZF2 (>=2.5) client library for [Mandrill's API](https://mandrillapp.com/api/docs/).

This library provides all of the functionality present in the [official PHP client](https://bitbucket.org/mailchimp/mandrill-api-php/), but makes use of namespaces, provides helper classes to ease message sending and works with Zend Framework 2 (>=2.5) (uses its library).

This library based on Joe Linn's library (https://github.com/jlinn/mandrill-api-php).

Installation Using [Composer](http://getcomposer.org/)
======================================================

Assuming composer.phar is located in your project's root directory, run the following command:

```bash
php composer.phar require freax/mandrill-zend2:2.*
```

Usage
=====
Sending a Message
-----------------

```php
use Mandrill\Mandrill;
use Mandrill\Struct\Message;
use Mandrill\Struct\Recipient;

// instantiate a client object
$mandrill = new Mandrill('your_api_key');

// instantiate a Message object
$message = new Message();

// define message properties
$message->text = 'Hello, *|NAME|*!';
$message->subject = 'Test';
$message->from_email = 'test@example.com';
$message->from_name = 'Mandrill API Test';

// instantiate a Recipient object and add details
$recipient = new Recipient();
$recipient->email = 'recipient.email@example.com';
$recipient->name = 'Recipient Name';
$recipient->addMergeVar('NAME', $recipient->name);

// add the recipient to the message
$message->addRecipient($recipient);

// send the message
$response = $mandrill->messages()->send($message);
```

Sending a ZF2 Message
-----------------

```php
use Mandrill\Mandrill;
use Mandrill\Struct\Message;

// convert from ZF message
// $zfMessage is instance of \Zend\Mail\Message
$message = Message::convertZFMail($zfMessage);

// add any field you want
$message->metadata = ...;

// instantiate a client object
$mandrill = new Mandrill('your_api_key');

// send the message
$response = $mandrill->messages()->send($message);
```
