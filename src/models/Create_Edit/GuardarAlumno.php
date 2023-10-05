<?php
session_start();
//se verifica si la conexcion es post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //se almacena envariables los datos traidos desde el formulario    
$dni=$_POST["dni"];
$nombre=$_POST["nombre"];
$email=$_POST["email"];
$dir=$_POST["dir"];
$phone=$_POST["phone"];
$fecha=$_POST["fecha"];
$id=$_SESSION["id"];
$rol= $_POST["rol"];

if (empty($rol) || empty($nombre) || empty($dni) || empty($email) || empty($dir) || empty($phone)||empty($fecha)) {
    $_SESSION["vacio"] = "<P style ='color: red;'> Uno o más campos están vacíos <br> Por favor, completa todos los campos. </p>";
    header("location: /src/views/views_admin/AlumnoEditar.php");
}else {
    require_once($_SERVER["DOCUMENT_ROOT"]. "/config/database.php"); //conexión a la base de datos

   // Suponiendo que ya tienes la conexión PDO establecida en $pdo
$stmt = $pdo->prepare("UPDATE alumnos SET   
DNI = :dni, 
NOMBRE = :nombre,
CORREO = :email,
DIRECCION = :dir,
NACIMIENTO = :fecha,
TELEFONO = :phone
ID_ROL = :rol
WHERE ID = :id");

// Bind de los parámetros
$stmt->bindParam(':dni', $dni);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':dir', $dir);
$stmt->bindParam(':fecha', $fecha);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':rol', $rol);

// Ejecutar la consulta
$stmt->execute();

    }
    if($stmt) {
        $sql = "SELECT * FROM alumnos WHERE ID = $id"; //se hace una nueva consulta en un ID
        $stmt = $pdo->prepare($sql); //se traen los valores ya actualizados
        $stmt->bindParam(':id', $id);
        

                if ($stmt->rowCount() === 1) {
                // Obtén la fila con los nuevos datos 
                $fila = $stmt->fetch(PDO::FETCH_ASSOC); //se crea un arreglo asociativo
                // Actualiza $_SESSION["user_data"] con los nuevos datos
                $_SESSION["user_data"] = $fila; 
                    header("location: /src/views/views_admin/AlumnosDash.php");
}else {
    header("location: /src/views/views_admin/AlumnosDash.php");
   $_SESSION["vicio"] = "<p style ='color:red;'>'Error al actualizar  La información personal'</p>";
} } }
