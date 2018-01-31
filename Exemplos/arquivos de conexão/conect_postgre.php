<?php 

$conn = new PDO("pgsql:host=nome_host dbname=nome_banco user=usuario password=senha");

$stmt = $conn->prepare("SELECT * FROM tb-usuarios ORDER BY deslogin;");

$stmt->execute();

$results = $stmt->fechAll(PDO::FETCH_ASSOSC);

echo json_encode($results);

 ?>