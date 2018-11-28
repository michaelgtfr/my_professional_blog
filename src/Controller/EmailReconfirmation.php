<?php
namespace MyModule\Controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;

/**
*Class to display the confirmation page of the email address.
*/
class EmailReconfirmation
{
    public function __invoke(HTTPRequest $request)
    {
        echo (new TemplateLoader)->twigTemplate('emailReconfirmation.php', [
            'email' =>  $request->getGET('email')
            ]);
    }
}