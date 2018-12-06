<?php
namespace MyModule\controller;

use MyApp\HTTP\HTTPRequest;
use MyApp\TemplateLoader;
use MyModule\service\SendEmail;

/**
*Class allowing the treatment and sending by message of the form of contact.
*/
class ContactForm
{
    private $templateLoader;

    public function __construct()
    {
        $this->templateLoader = new TemplateLoader();
    }

    public function __invoke(HTTPRequest $request)
    {
        if ($request->getParams()[0] == 1) {
            $subject = 'Message de '.$request->getPOST('name');
        } elseif ($request->getParams()[0] == 2) {
            $subject = 'Message de '. $request->getPOST('name') .'[' . $request->getPOST('role') . ' du site]';
        }
        $content = $this->templateLoader->generate('contactForm.php', [
                'email' => $request->getPOST('email'),
                'message' => $request->getPOST('message')]);

        new SendEmail('michael.garret.france@gmail.com', $subject, $content);

        $message = 'félicitation votre message à été envoyé sur l\'email administrateur';

        echo $this->templateLoader->twigTemplate('message.php', [
            'message' => $message
            ]);
    }
}
