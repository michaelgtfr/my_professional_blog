<?php
namespace MyApp;

/**
*Class to check if the page exists, if it has been retrieved from the elements of the page to display.
*/
class TemplateLoader
{
    // Use to retrieve items in a file
    private function generate($file, $data)
    {
        $fichier = __DIR__.'./../templates/'.$file;
        if (file_exists($fichier)) {
            extract($data);
            ob_start();

            require __DIR__.'./../templates/'.$file;
            return ob_get_clean();
        } else {
            $message = 'Désolée mais une erreur est survenue pendant l\'envoie du message'

            (new TemplateLoader)->twigTemplate('message.php', [
                'message' => $message
                ]);
        }
    }

    public function twigTemplate($file, $data)
    {
        $fichier = __DIR__.'./../templates/'.$file;
        if (file_exists($fichier)) {
            $loader = new \Twig_Loader_Filesystem(__DIR__.'./../templates');
            $twig = new \Twig_Environment($loader, array('cache' => false));

            echo $twig->render($file, $data);
        } else {
            $message = 'Désolée mais nous ne trouvons pas la page';

            (new TemplateLoader)->twigTemplate('message.php', [
                'message' => $message
                ]);
        }
    }
}
