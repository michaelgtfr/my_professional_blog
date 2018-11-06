<?php

namespace MyModule\Controller;

use MyApp\TemplateLoader;

/**
*Class calling the registration page.
*/
class registrationPage
{
	public function __invoke()
	{
		echo (new TemplateLoader)->generate('registrationPage.php', []);
	}
}
