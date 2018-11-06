<?php

namespace MyModule\fonction;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;

/**
*Class permettant l'envoie d'email à l'utilisateur.
*/
class SendEmail
{
	public function __construct($to, $subject, $text)
	{
    	$transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('michael.garret.france@gmail.com')
        ->setPassword('mlgt180391');

    	$mailer = new \Swift_Mailer($transport);

    	$message = new \Swift_Message();

    	$message->setSubject($subject);

    	$message->setFrom(['michael.garret.france@gmail.com' => 'My Professional Blog']);

    	$message->setTo($to);

    	$message->setbody($text, 'text/html');

    	$result = $mailer->send($message);
	}
}
