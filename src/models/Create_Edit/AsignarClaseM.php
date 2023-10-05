<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    extract($_POST);
    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

    $id=$_SESSION["id"];
    $smtnt = $pdo->prepare("INSERT INTO maestros_clases (ID_MAESTROS, ID_CLASES) VALUES (:id_m, :id_c)");
    $smtnt->bindParam(":id_m", $id, PDO::PARAM_INT);
    $smtnt->bindParam(":id_c",$id_clases, PDO::PARAM_INT);
    $smtnt->execute();
    header("location: /src/views/views_admin/Maestros/MaestroClase.php?id=${id}");

   // var_dump($id);


}