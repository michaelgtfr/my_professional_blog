<?php

function sendEmail($to, $subject, $message)
{
    ini_set('SMTP','smtp.free.fr');
    ini_set('sendmail_from', 'michael.garret.france@gmail.com');

    mail($to, $subject, $message);
}