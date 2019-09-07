<?php
namespace MyModule\service;

use Swift_Attachment;
use Swift_Image;

/**
*Class for sending email to the user.
*/
class SendEmail
{
    public function __construct($email, $subject, $text)
    {
        $transport = (new \Swift_SmtpTransport(EMAIL_SMTP, EMAIL_PORT, EMAIL_CLE))
        ->setUsername(EMAIL_USER)
        ->setPassword(EMAIL_PASSWORD);

        $mailer = new \Swift_Mailer($transport);

        $message = new \Swift_Message();

        $message->setSubject($subject);

        $message->setFrom(['michael.garret.france@gmail.com' => 'My Professional Blog']);

        $message->setTo($email);

        $message->setbody($text, 'text/html');

        $mailer->send($message);
    }
}
