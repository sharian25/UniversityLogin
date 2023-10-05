<?php
session_start();
//se verifica si la variable de session trae datos si de lo contrario estará vacia
$postData = isset($_SESSION["post_data"]) ? $_SESSION["post_data"] : [];
//var_dump($postData);
//si no existe correo se avisará
$hash = password_hash($postData["pass"], PASSWORD_DEFAULT);
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
            //verificamos permisos al que pertenece el correo
            //administrador
            var_dump($results);

                //admin
            if ($results[0]["ID_ROL"] == 1) {
                if (password_verify($postData["pass"], $results[0]["PASS"])) {
                    $_SESSION["user-data"] = $results;
                echo "soy admin";
               header("location: /src/views/views_admin/AdminDash.php");
                } else {
                header("location: /index.php");
                $_SESSION["nonyes"] = " <p style ='color:red;'>Contraseña incorrecta</p> ";
                }
                
    
                //Maestros   
            } elseif ($results[0]["ID_ROL"] == 2) {
                if (password_verify($postData["pass"], $results[0]["PASS"])) {
                $_SESSION["user-data"] = $results;
                //echo "soy master";
                header("location: /src/views/views_Masters/DashMasters.php");
                }else{
                    header("location: /index.php");
                    $_SESSION["nonyes"] = " <p style ='color:red;'>Contraseña incorrecta</p> ";
                }

               //Alumnos 
            } elseif ($results[0]["ID_ROL"] == 3) { 
                if (password_verify($postData["pass"], $results[0]["PASS"])) {
                    $_SESSION["user-data"] = $results;
              // echo "soy student";
              header("location: /src/views/views_alumno/Dashalum.php");
                } else {
                    header("location: /index.php");
                    $_SESSION["nonyes"] = " <p style ='color:red;'>Contraseña incorrecta</p> ";
                    
                }
                
                
               
            }
        } 
                
        

         $declaration = $pdo->prepare("SELECT * FROM maestros WHERE CORREO = :mail");
        $declaration->bindParam(':mail', $postData['email'], PDO::PARAM_STR);
        $declaration->execute();
        if ($declaration->rowCount() == 1) {
            $results = $declaration->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($results);

                 //admin
                 if ($results[0]["ID_ROL"] == 1) {
                    if (password_verify($postData["pass"], $results[0]["PASS"])) {
                        $_SESSION["user-data"] = $results;
                    echo "soy admin";
                   header("location: /src/views/views_admin/AdminDash.php");
                    } else {
                    header("location: /index.php");
                    $_SESSION["nonyes"] = " <p style ='color:red;'>Contraseña incorrecta</p> ";
                    }
                    
        
                    //Maestros   
                } elseif ($results[0]["ID_ROL"] == 2) {
                    if (password_verify($postData["pass"], $results[0]["PASS"])) {
                    $_SESSION["user-data"] = $results;
                    //echo "soy master";
                    header("location: /src/views/views_Masters/DashMasters.php");
                    }else{
                        header("location: /index.php");
                        $_SESSION["nonyes"] = " <p style ='color:red;'>Contraseña incorrecta</p> ";
                    }
    
                   //Alumnos 
                } elseif ($results[0]["ID_ROL"] == 3) { 
                    if (password_verify($postData["pass"], $results[0]["PASS"])) {
                        $_SESSION["user-data"] = $results;
                  // echo "soy student";
                  header("location: /src/views/views_alumno/Dashalum.php");
                    } else {
                        header("location: /index.php");
                        $_SESSION["nonyes"] = " <p style ='color:red;'>Contraseña incorrecta</p> ";
                        
                    }
                    
                    
                   
                }

        

        } 
         $declaration = $pdo->prepare("SELECT * FROM administrador WHERE CORREO = :mail");
        $declaration->bindParam(':mail', $postData['email'], PDO::PARAM_STR);
        $declaration->execute();
        if ($declaration->rowCount() == 1) {
            $results = $declaration->fetchAll(PDO::FETCH_ASSOC);
          // var_dump($results);

                 //admin
                 if ($results[0]["ID_ROL"] == 1) {
                    if (password_verify($postData["pass"], $results[0]["PASS"])) {
                        $_SESSION["user-data"] = $results;
                   // echo "soy admin";
                   header("location: /src/views/views_admin/AdminDash.php");
                    } else {
                    header("location: /index.php");
                    $_SESSION["nonyes"] = " <p style ='color:red;'>Contraseña incorrecta</p> ";
                    }
                    
        
                    //Maestros   
                } elseif ($results[0]["ID_ROL"] == 2) {
                    if (password_verify($postData["pass"], $results[0]["PASS"])) {
                    $_SESSION["user-data"] = $results;
                    //echo "soy master";
                    header("location: /src/views/views_Masters/DashMasters.php");
                    }else{
                        header("location: /index.php");
                        $_SESSION["nonyes"] = " <p style ='color:red;'>Contraseña incorrecta</p> ";
                    }
    
                   //Alumnos 
                } elseif ($results[0]["ID_ROL"] == 3) { 
                    if (password_verify($postData["pass"], $results[0]["PASS"])) {
                        $_SESSION["user-data"] = $results;
                  // echo "soy student";
                  header("location: /src/views/views_alumno/Dashalum.php");
                    } else {
                        header("location: /index.php");
                        $_SESSION["nonyes"] = " <p style ='color:red;'>Contraseña incorrecta</p> ";
                        
                    }
                   
                }
            
        } 
        //si ahy un erro aqui muestra el codigo
    } catch (PDOException $e) {
        echo "No puedes iniciar Sesión por: " . $e->getCode();
        }
}
