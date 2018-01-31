<?php 

$images = "images";

$scanDiretorio = scandir($images);

$data = array();

foreach ($scanDiretorio as $img) {
	if (!in_array($img, array(".", ".."))) {
		
		$filename = "images".DIRECTORY_SEPARATOR.$img;

		$info = pathinfo($filename);

		$info["size"] = filesize($filename);
		$info["modified"] = date("d/m/Y H:i:s", filemtime($filename));
		$info["url"] = "http://localhost/diretorios/".str_ireplace("\\", "/", $filename);

		array_push($data, $info);
	}

}

echo json_encode($data);

 ?>