<?php 

require_once("config.php");

// Carrega um usuario //
//$manoel = new Usuario();
//$manoel->loadById(1);
//echo $manoel;

// Carrega uma lista de usuarios //
$lista = Usuario::getList();
echo json_encode($lista);

// Carrega uma lista de usuarios buscando pelo login //
//$search = Usuario::search("a");
//echo json_encode($search);

// Carrega um usuario autenticado //
//$usuario = new Usuario();
//$user = "manoel";
//$pass = "123456";
//$usuario->login($user, $pass);
//echo $usuario;

// Cria um usuario //
//$usuario = new Usuario("Neolp", "123456");
//$usuario->insert();
//echo($usuario);

// Altera um usuario pelo id //
//$usuario = new Usuario();
//$usuario->loadById(1);
//$usuario->update("NickDias", "!@#$");
//echo $usuario;

// Deleta um usuario pelo ID;
//$usuario = new Usuario();
//$usuario->delete();
//echo $usuario;



 ?>