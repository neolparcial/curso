<?php 

require_once("config.php");

$manoel = new Usuario();

$manoel->loadById(8);

echo $manoel;

 ?>