<?php 

$data = array(
	"empresa"=>"Mapedine",
	"funcionario"=>"Manoel"
);

setcookie("NOME_COOKIE", json_encode($data), time() + 3600);

echo "Cookie criado!";

 ?>