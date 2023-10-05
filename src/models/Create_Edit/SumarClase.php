<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    extract($_POST);
    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

    $id= $_SESSION["user-data"][0]["ID"];
    $smtnt = $pdo->prepare("INSERT INTO alumnos_clases (ID_ALUMNOS, ID_CLASES) VALUES (:id_a, :id_c)");
    $smtnt->bindParam(":id_a", $id, PDO::PARAM_INT);
    $smtnt->bindParam(":id_c",$id_clases, PDO::PARAM_INT);
    $smtnt->execute();
   header("location: /src/views/views_alumno/ClasesAlum.php");
   var_dump($id);


}