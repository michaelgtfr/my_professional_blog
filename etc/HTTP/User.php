<?php

/**class permettant de récupéré les données personnels de l'utilisateur*/
class User
{
	/**methode permettant de recupéré les sessions*/
	public function getSession($key)
	{
        return $_SESSION['$key'];
	}
}