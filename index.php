<?php
//Les parametres de configuration
require_once("config.php");
/**
*Appel au controlleur du header.
*/
require_once(CONTROLLER. 'HeaderController.php');
// La vue de bienvenue
require_once(CONTROLLER. 'WelcomController.php');
/**
*Appel au controlleur du footer.
*/
require_once(CONTROLLER. 'FooterController');
 ?>
