<?php
//Definition de constantes utiles.
define('CONTROLLER','Controller/');
define('VIEW',  'View/');
define('CSS','View/Assets/css/');
define('JS','View/Assets/js');
define('IMG','View/Assets/img');
//Chargement des parametres
// TODO: controller parametres.

//Charge le bon controlleur
function loadController($controller)
{
  require_once(CONTROLLER .$controller. '.class.php' );
}
spl_autoload_register('loadController');
//Charge la bonne classe
function loadClass($class)
{
  require_once(MODEL .$class. '.class.php' );
}
 ?>
