<?php 

$email = $_POST['inputEmail'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
	"secret"=>"6Lc3DkgUAAAAAAYNK6Rg5xu8d6UC7Y57e0jxPu34",
	"response"=>$_POST["g-recaptcha-response"],
	"remoreip"=>$_SERVER["REMOTE_ADDR"]
)));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$recaptcha = json_decode(curl_exec($ch), true);

curl_close($ch);

if($recaptcha["success"] === true){
	echo "$email cadastrado com sucesso!";
} else{
	echo "Você é um robo!";
}

 ?>