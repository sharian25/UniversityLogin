<?php


try {
    session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

// Consulta para obtener datos de la tabla alumnos
$consulta = $pdo->query("SELECT * FROM clases");
//pasamos la consulta a un arreglo
$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
//guardamos el arreglo en una variable se sessión para uso futuro
$_SESSION["clases"] = $resultados;
//var_dump($_SESSION);

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($resultados);

} catch (PDOException $e) {
    error_log('Error en la conexión a la base de datos: ' . $e->getMessage());
}
?>

