<?php
namespace MyModule\service;

use MyApp\TemplateLoader;
use MyApp\HTTP\HTTPRequest;
use MyConfig\Dev;

/**
*Class for sending email to the user.
*/
class SendEmail extends Dev
{
    public function __construct($email, $subject, $text)
    {
        $transport = (new \Swift_SmtpTransport(self::EMAIL_SMTP, self::EMAIL_PORT, self::EMAIL_CLE))
        ->setUsername(self::EMAIL_USER)
        ->setPassword(self::EMAIL_PASSWORD);

        $mailer = new \Swift_Mailer($transport);

        $message = new \Swift_Message();

        $message->setSubject($subject);

        $message->setFrom(['michael.garret.france@gmail.com' => 'My Professional Blog']);

        $message->setTo($email);

        $message->setbody($text, 'text/html');

        $mailer->send($message);
    }
}
