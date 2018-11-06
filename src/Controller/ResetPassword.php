<?php

namespace MyModule\Controller;

use MyApp\TemplateLoader;

/**
*Class to display the form for changing a password.
*/
class resetPassword
{
	public function __invoke()
	{
		echo (new TemplateLoader)->generate('resetPassword.php','');
	}
}
