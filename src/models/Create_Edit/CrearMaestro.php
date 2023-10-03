<?php
session_start();
//se verifica si la conexcion es post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //se almacena envariables los datos traidos desde el formulario    
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $dir = $_POST["dir"];
    $phone = $_POST["phone"];
    $fecha = $_POST["fecha"];
    $pass= $_POST["pass"];
    $rol= $_POST["rol"];
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    if (empty($rol) || empty($nombre) || empty($dni) || empty($email) || empty($dir) || empty($phone) || empty($fecha) || empty($hash)) {
        $_SESSION["vacio"] = "<P style ='color: red;'> Uno o más campos están vacíos <br> Por favor, completa todos los campos. </p>";
        header("location: /src/views/views_admin/AlumnoCrear.php");
    } else {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php"); //conexión a la base de datos

        // Suponiendo que ya tienes la conexión PDO establecida en $pdo


    }
    try {
        $stmt = $pdo->prepare("INSERT INTO maestros (DNI, NOMBRE, CORREO, PASS, DIRECCION,  NACIMIENTO, ID_ROL, TELEFONO)
   VALUES (:dni, :nombre, :email , :hash, :dir, :fecha, :rol, :phone )");

// Bind de los parámetros
$stmt->bindParam(':dni', $dni);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':hash', $hash);
$stmt->bindParam(':dir', $dir);
$stmt->bindParam(':fecha', $fecha);
$stmt->bindParam(':rol', $rol);
$stmt->bindParam(':phone', $phone);


// Ejecutar la consulta
$stmt->execute();

        if ($stmt) {
            $sql = "SELECT * FROM maestros WHERE ID_MAESTROS = $id"; //se hace una nueva consulta en un ID
            $stmt = $pdo->prepare($sql); //se traen los valores ya actualizados
            $stmt->bindParam(':id', $id);


            if ($stmt->rowCount() === 1) {
                // Obtén la fila con los nuevos datos 
                $fila = $stmt->fetch(PDO::FETCH_ASSOC); //se crea un arreglo asociativo
                // Actualiza $_SESSION["user_data"] con los nuevos datos
                $_SESSION["user_data"] = $fila;
                //muestra el dashboard de maestros con los nuevos datos
                header("location: /src/views/views_admin/MaestrosDash.php");
            } else {
                //muestra el dashboard con el mensaje de 
                header("location: /src/views/views_admin/MaestrosDash.php");
                $_SESSION["vicio"] = "<p style ='color:red;'>'Error al actualizar  La información personal'</p>";
            }
        }
    } catch (PDOException $e) {
        if ($e->getCode() === 23000) {
            $_SESSION["duplicado"] = "<p style ='color: red;'>El correo esta Registrado</p>";
            header("location: /src/views/views_admin/AlumnosDash.php");
        } else {
            echo "Error:" . $e->getMessage();
        }
    }
}
