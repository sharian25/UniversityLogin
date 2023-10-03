<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php"); //conectamos a la base de datos

if ($_SERVER["REQUEST_METHOD"] === "POST") { //verificamos si el envio de datos es metodo post
    session_start();  //iniciamos una sesion para utilizar la variable de session
    $_SESSION["post_data"] = $_POST; //almacenamos los datos del formulario en una variable de session
  header("location: /src/models/Login.php"); //redirigimos al archivo de logeo
} else {

    function index() // si no se cumple lo anterior se ejecuta la pagina principal 
{
    include($_SERVER["DOCUMENT_ROOT"] . "/src/views/login.php");
}
}


