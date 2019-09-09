<?php
namespace MyModule\controller;

use MyApp\TemplateLoader;

/**
 * Class de disconnection of user account
 */
class Disconnection
{
    public function __invoke()
    {
        session_destroy();

        $message = 'vous êtes déconnecté';

        (new TemplateLoader)->twigTemplate('message.php', [
            'message' => $message
        ]);
    }
}
