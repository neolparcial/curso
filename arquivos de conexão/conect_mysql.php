<?php 

$conn = new PDO("mysql:dbname=dbphp7; host=localhost", "root", "");

$stmt = $conn->prepare("SELECT * FROM tb-usuarios ORDER BY deslogin;");

$stmt->execute();

$results = $stmt->fechAll(PDO::FETCH_ASSOSC);

echo json_encode($results);

 ?>