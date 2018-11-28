<?php
namespace MyModule\controller;

use MyApp\TemplateLoader;

/**
*Class calling the registration page.
*/
class RegistrationPage
{
    public function __invoke()
    {
        echo (new TemplateLoader)->twigTemplate('registrationPage.php', []);
    }
}
