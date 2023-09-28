<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php"); //conectamos a la base de datos

function index() 
{
    /* $datos = all(); */
    include($_SERVER["DOCUMENT_ROOT"] . "/src/views/login.php");
}
