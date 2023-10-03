<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");
session_start();
$_SESSION["id"] = $_GET['id'];
//var_dump($_SESSION["id"]);
$id=$_SESSION["id"];
delete($id);

function delete($id) {
    global $pdo;
    $stmnt = $pdo->prepare("DELETE FROM maestros WHERE id_maestros =:id");
    $stmnt->bindParam(":id", $id ,PDO::PARAM_INT);
    $stmnt->execute();
    header("location: /src/views/views_admin/MaestrosDash.php");
}