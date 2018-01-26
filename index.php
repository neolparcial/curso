<?php 

require_once("config.php");

// Carrega um usuario //
//$manoel = new Usuario();
//$manoel->loadById(7);
//echo $manoel;

// Carrega uma lista de usuarios //
//$lista = Usuario::getList();
//echo json_encode($lista);

// Carrega uma lista de usuarios buscando pelo login //
//$search = Usuario::search("a");
//echo json_encode($search);

// Carrega um usuario autenticado //
$usuario = new Usuario();
$user = "Manoel";
$pass = "123456";
$usuario->login($user, $pass);
echo $usuario;

 ?>