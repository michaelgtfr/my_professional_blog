<?php
namespace MyModule\controller;

use MyApp\TemplateLoader;

/**
*Class to display the form for changing a password.
*/
class ResetPassword
{
    public function __invoke()
    {
        (new TemplateLoader)->twigTemplate('resetPassword.php', []);
    }
}
