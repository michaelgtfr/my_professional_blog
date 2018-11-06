<?php

namespace MyApp;

/**
*Class to check if the page exists, if it has been retrieved from the elements of the page to display.
*/
class TemplateLoader
{
    public function generate(string $templateName, $returnMessages)
    {
        return $this->generateFile($templateName, $returnMessages);
    }

    private function generateFile($file, $data)
    {
        $fichier = __DIR__.'./../templates/'.$file;
        if (file_exists($fichier)) {
            extract($data);
            ob_start();

            require __DIR__.'./../templates/'.$file;
            return ob_get_clean();
        } else {
            throw new \Exception(sprintf('this file does not exist'));
        }
    }
}
