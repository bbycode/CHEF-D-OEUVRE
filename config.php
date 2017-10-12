<?php
//Definition de constantes utiles.
define('MODEL','Model/');
define('CONTROLLER','Controller/');
define('VIEW',  'View/');
define('CSS','View/Assets/css/');
define('JS','View/Assets/js');
define('IMG','View/Assets/img');
//Chargement des parametres
// TODO: controller parametres.
// Charge la bonne classe
function loadClass($class)
{
  require_once(MODEL .$class. '.class.php' );
}
    spl_autoload_register("loadClass");
?>
