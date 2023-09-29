<?php
session_start();
//se verifica si la variable de session trae datos si de lo contrario estará vacia
$postData = isset($_SESSION["post_data"]) ? $_SESSION["post_data"] : []; 
//si no existe correo se avisará
if ($postData["email"] == "") {
    $_SESSION["nonyes"] = "<P style ='color:red;'> falta el correo </p>";
    header("location: /index.php");
//si no existe pass word se avisará
} elseif (($postData["pass"] == "")) {
    $_SESSION["nonyes"] = " <p style ='color:red;'>falta la contraseña</p> ";
    header("location: /index.php");
    //ejecuta el login
} else {

    require_once($_SERVER["DOCUMENT_ROOT"]."/config/database.php"); //conexion  a la base de datos


}
