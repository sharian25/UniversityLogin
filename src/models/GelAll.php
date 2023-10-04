<?php


    session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

// Consulta para obtener datos de la tabla alumnos

//$consulta = $pdo->prepare("SELECT * FROM administrador");
$consulta = $pdo->prepare("SELECT * FROM administrador");
$consulta->execute();



//pasamos la consulta a un arreglo
//$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

//guardamos el arreglo en una variable se sessión para uso futuro
$_SESSION["alumnos"] = $resultados;
//var_dump($resultados);

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($resultados);
 


?>