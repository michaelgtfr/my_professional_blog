<?php
namespace MyModule\service;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;

/**
*Class for sending email to the user.
*/
class SendEmail
{
    public function __construct($email, $subject, $text)
    {
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('michael.garret.france@gmail.com')
        ->setPassword('mlgt180391');

        $mailer = new \Swift_Mailer($transport);

        $message = new \Swift_Message();

        $message->setSubject($subject);

        $message->setFrom(['michael.garret.france@gmail.com' => 'My Professional Blog']);

        $message->setTo($email);

        $message->setbody($text, 'text/html');

        $mailer->send($message);
    }
}
