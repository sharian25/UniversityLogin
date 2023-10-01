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
    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php"); //conexion  a la base de datos
    try {
        //se revisa email en el servidor
        $declaration = $pdo->prepare("SELECT * FROM alumnos WHERE CORREO = :mail");
        //vinculamos el resutlado de la consulta a una varible
        $declaration->bindParam(':mail', $postData['email'], PDO::PARAM_STR);
        $declaration->execute();
        //verifica si en la consulta hubo respuesta 
        if ($declaration->rowCount() == 1) {
            //se convierten los datos de la consulta en un arreglo asociativo
            $results = $declaration->fetchAll(PDO::FETCH_ASSOC);
            //valida si la contraseña guardada es la misma digitada (sin has)

            if ($results[0]["PASS"] === $postData["pass"]) {
                //iniciamos sessión movemos los datos de $resuld a una variable de sessión
                session_start();
                $_SESSION["user-data"] = $results;
                //se envia la vista principal
                header("location: /src/views/views_alumno/DashAlum.php");
            } elseif (password_verify($postData["pass"], $result["PASS"])) {
                session_start();
                $_SESSION["user_data"] = $result; //todo el resultado de la base de dato se guarda en la variable de sesión
                header("location: /src/views/views_alumno/DashAlum.php"); //se envia a la pagina donde estan los datos del usuario de la base de datos
            } else {
                //se envia mensaje por si la contraseña no existe en la base de datos
                $_SESSION["nonyes"] = " <p style ='color:red;'>No es la contraseña</p> ";
                header("location: /index.php");
            }
        }


        $declaration = $pdo->prepare("SELECT * FROM maestros WHERE CORREO = :mail");
        $declaration->bindParam(':mail', $postData['email'], PDO::PARAM_STR);
        $declaration->execute();

        if ($declaration->rowCount() == 1) {
            $results = $declaration->fetchAll(PDO::FETCH_ASSOC);


            if ($results[0]["PASS"] === $postData["pass"]) {
                session_start();
                $_SESSION["user-data"] = $results;
                header("location: /src/views/views_Masters/DashMasters.php");
            } elseif (password_verify($postData["pass"], $result["PASS"])) {
                session_start();
                $_SESSION["user_data"] = $results;
                header("location: /src/views/views_Masters/DashMasters.php");
            } else {
                $_SESSION["nonyes"] = " <p style ='color:red;'>No es la contraseña</p> ";
                header("location: /index.php");
            }
        }

        
        $declaration = $pdo->prepare("SELECT * FROM administrador WHERE CORREO = :mail");
        $declaration->bindParam(':mail', $postData['email'], PDO::PARAM_STR);
        $declaration->execute();

        if ($declaration->rowCount() == 1) {
            $results = $declaration->fetchAll(PDO::FETCH_ASSOC);

            if ($results[0]["PASS"] === $postData["pass"]) {
                session_start();
                $_SESSION["user-data"] = $results;
                header("location: /src/views/views_admin/AdminDash.php");
            } 
            elseif (password_verify($postData["pass"], $result["PASS"])) {
                session_start();
                $_SESSION["user_data"] = $results;
                header("location: /src/views/views_admin/AdminDash.php");
            } 
            else {
                $_SESSION["nonyes"] = " <p style ='color:red;'>No es la contraseña</p> ";
                header("location: /index.php");
            }
        } /* else { //esta parte del codigo no permite que los usuarios entren
            $_SESSION["nonyes"] = " <p style ='color:red;'>Correo no registrado</p> ";
            header("location: /index.php");
        } */

        //si ahy un erro aqui muestra el codigo
    } catch (PDOException $e) {
        echo "Código de error: " . $e->getCode();
    }
}
