<?php
session_start();
//se verifica si la conexcion es post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //se almacena envariables los datos traidos desde el formulario    
    $clase = $_POST["clase"];
    
    if (empty($clase)) {
        $_SESSION["vacio"] = "<P style ='color: red;'>  el campos está vacío. </p>";
        header("location: /src/views/views_admin/AlumnoCrear.php");
    } else {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php"); //conexión a la base de datos

        // Suponiendo que ya tienes la conexión PDO establecida en $pdo


    }
    try {
        $stmt = $pdo->prepare("INSERT INTO clases (CLASE)
   VALUES (:clase)");

// Bind de los parámetros
$stmt->bindParam(':clase', $clase);

// Ejecutar la consulta
$stmt->execute();

        if ($stmt) {
            $sql = "SELECT * FROM clases WHERE ID_CLASES = $id"; //se hace una nueva consulta en un ID
            $stmt = $pdo->prepare($sql); //se traen los valores ya actualizados
            $stmt->bindParam(':id', $id);


            if ($stmt->rowCount() === 1) {
                // Obtén la fila con los nuevos datos 
                $fila = $stmt->fetch(PDO::FETCH_ASSOC); //se crea un arreglo asociativo
                // Actualiza $_SESSION["user_data"] con los nuevos datos
                $_SESSION["user_data"] = $fila;
                header("location: /src/views/views_admin/clases.php");
            } else {
                header("location: /src/views/views_admin/clases.php");
                $_SESSION["vicio"] = "<p style ='color:red;'>'Error al actualizar  La información personal'</p>";
            }
        }
    } catch (PDOException $e) {
        if ($e->getCode() === 23000) {
            $_SESSION["duplicado"] = "<p style ='color: red;'>La clase ya está Registrada</p>";
            header("location: /src/views/views_admin/clases.php");
        } else {
            echo "Error:" . $e->getMessage();
        }
    }
}
