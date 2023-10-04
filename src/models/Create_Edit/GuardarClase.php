<?php
session_start();
//se verifica si la conexcion es post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $clase=$_POST["clase"];
    $id=$_SESSION["id"];


    //se almacena envariables los datos traidos desde el formulario  
if (empty($clase)) {
    $_SESSION["vacio"] = "<P style ='color: red;'> El campo esta vacio </p>";
    header("location: /src/views/views_admin/Clases.php");
}else {
    require_once($_SERVER["DOCUMENT_ROOT"]. "/config/database.php"); //conexión a la base de datos

   // Suponiendo que ya tienes la conexión PDO establecida en $pdo
$stmt = $pdo->prepare("UPDATE clases SET   
CLASE = :clase 
WHERE ID_CLASES = :id");

// Bind de los parámetros
$stmt->bindParam(':clase', $clase);
$stmt->bindParam(':id', $id);

// Ejecutar la consulta
$stmt->execute();

    }
    if($stmt) {
        $sql = "SELECT * FROM clases WHERE ID_CLASES = $id"; //se hace una nueva consulta en un ID
        $stmt = $pdo->prepare($sql); //se traen los valores ya actualizados
        $stmt->bindParam(':id', $id);
        

                if ($stmt->rowCount() === 1) {
                // Obtén la fila con los nuevos datos 
                $fila = $stmt->fetch(PDO::FETCH_ASSOC); //se crea un arreglo asociativo
                // Actualiza $_SESSION["user_data"] con los nuevos datos
                $_SESSION["user_data"] = $fila; 
                    header("location: /src/views/views_admin/Clases.php");
}else {
    header("location: /src/views/views_admin/Clases.php");
   $_SESSION["vacio"] = "<p style ='color:red;'>'Error al actualizar  La Clase'</p>";
} } }
