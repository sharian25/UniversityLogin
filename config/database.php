<?php
//traemos nuestra base de datos desde el servidor --PDO--
try {
    $host ="localhost";
    $username ="root";
    $password ="";
    $dbname = "university";
    $dsn = "mysql:host=$host;dbname=$dbname";
    
    $pdo = new PDO ($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Error el conectar a la base de datos: " . $e->getMessage();
}