<?php 

$conn = new PDO("sqlsrv:Database=dbphp7; server:localhost\SQLEXPRESS; ConnectionPooling=0", "sa", "root");

$stmt = $conn->prepare("SELECT * FROM tb-usuarios ORDER BY deslogin;");

$stmt->execute();

$results = $stmt->fechAll(PDO::FETCH_ASSOSC);

echo json_encode($results);

 ?>