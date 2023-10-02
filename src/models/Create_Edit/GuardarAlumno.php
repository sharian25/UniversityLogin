<?php

//se verifica si la conexcion es post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //se almacena envariables los datos traidos desde el formulario
$dni=$_POST["dni"];
$nombre=$_POST["nombre"];
$email=$_POST["email"];
$dir=$_POST["dir"];
$phone=$_POST["phone"];
$fecha=$_POST["fecha"];

var_dump($_POST);


if (empty($nombre) || empty($dni) || empty($email) || empty($dir) || empty($phone)||empty($fecha)) {
    $_SESSION["vacio"] = "<P style ='color: red;'> Uno o más campos están vacíos <br> Por favor, completa todos los campos. </p>";
    header("location: /src/views/views_admin/AlumnoEditar.php");
}else {
    echo  "Vas por buen camino";
}

/* 
//se verifican si estan vacias los campos y vuelve a la pagina principal
if (empty($cita) || empty($autor)) {
    header("location: /Index.php");
} else {
    //conexión al servidor
    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

    try {
        //se envian datos al servidor
        $result = $pdo->query("INSERT INTO citas(Frase,autor) VALUES ('$cita','$autor')");

        //si ahy un erro aqui muestra el codigo
    }  catch (PDOException $e) {
        echo "Código de error: " . $e->getCode();
    }
}

 */
}