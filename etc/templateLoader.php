<?php
function loadTemplate(string $templateName, $returnMessages)
{
	require __DIR__.'./../templates/'.$templateName;
}

