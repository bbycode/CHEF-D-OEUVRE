<?php
/**
 *Le controlleur appelle les classes requises.
 */
class Controller
{

  function __construct()
  {
    spl_autoload_register("loadClass");
  }
}
 ?>
