<?php
session_start();
if (!isset($_SESSION["user-data"])) {
    header("location: /src/views/Logout.php");
    exit();}
$_SESSION["id"] = $_GET['id'];
$id_buscado = $_SESSION["id"]-1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/dist/output.css">
    <title>Editar Maestro</title>
</head>

<body class="bg-blue-100 flex flex-col ">
    <div class="bg-white h-12 ml-48 flex">
        home
        <select class="ml-[85%]" id="logout" onchange="logout()">
            <option value="1"><?= $_SESSION["user-data"][0]["NOMBRE"] ?></option>
            <option value="logout">logout</option>
        </select>
    </div>
    <div class=" h-screen w-48 fixed bg-blue-900 pt-20 flex flex-col justify-normal">
        <div class="border-b-2 border-b-blue-700 flex items-center pb-[-50px]">
            <img src="/src/img/logo.jpg" alt="logo" class=" rounded-full h-10 w-10 ml-2 mt-[-100px]">
            <span class="text-white ml-5 mt-[-100px]">Universidad</span>
        </div>
        <div class="text-white border-b-2 border-b-blue-700 h-20 flex justify-center flex-col">
            <h3 class="ml-5"><?= $_SESSION["user-data"][0]["NOMBRE"] ?></h3>
            <span class="ml-5 text-xs">Administrador</span>
        </div>
        <div class="pt-5">
            <h2 class="text-center mb-4 text-white text-sm">Menu Administración </h2>
            <ul class="list-none pl-5">
                <li class="mb-2 hover:bg-sky-700"><a href="/src/views/views_admin/Permisos.php" class="block text-white"><i class="fa-solid fa-user-gear"></i><span class="m-3">Permisos</span> </a></li>
                <li class="mb-2 hover:bg-sky-700"><a href="/src/views/views_admin/MaestrosDash.php" class="block text-white"><i class="fa-solid fa-chalkboard-user"></i><span class="m-3">Maestros</span> </a></li>
                <li class="mb-2 hover:bg-sky-700"><a href="/src/views/views_admin/AlumnosDash.php" class="block text-white"><i class="fa-solid fa-graduation-cap"></i><span class="m-3">Alumnos</span> </a></li>
                <li class="mb-2 hover:bg-sky-700"><a href="/src/views/views_admin/Clases.php" class="block text-white"><i class="fa-solid fa-chalkboard"></i><span class="m-3">Clases</span> </a></li>
            </ul>
        </div>
    </div>
    <div class="content ml-52 p-4">
        <div class="flex justify-between">
            <p class="text-xl mb-4 ">Dashboard</p>
            <a href="/src/views/views_admin/AdminDash.php" class=""><span class="text-blue-700">Home</span>/Dashboard</a>
        </div>
        <p class="bg-white max-w-screen-sm h-14 text-sm p-2 rounded">Bienvenido<br>
            Selecciona la accion que quieras realizar en las pestañas del menu de la izquierda</p>
        <main class="h-screen flex justify-center flex-col items-center">
            <div class="h-[55%] w-[30%] bg-blue-200  rounded-lg">
              
            <h2 class="text-center fong-bold text-2xl p-5" >Edita la clase <?=($_SESSION["clases"][$id_buscado]["CLASE"])?></h2>
                <form action="/src/models/Create_Edit/GuardarClase.php" method="post" class="flex-col flex items-center">
                    <label class="font-bold ml-5">CLASE
                        <input name="clase" type="text" placeholder="<?=($_SESSION["clases"][$id_buscado]["CLASE"])?>" class="w-64 h-8 m-5">
                    </label>
                    <label class="font-bold ml-5 p-8">CLASE
                        <span><?=($_SESSION["clases"][$id_buscado]["MAESTRO"])?></span>
                    </label>
                    <label class="font-bold ml-5 p-8">INSCRITOS
                        <span><?=($_SESSION["clases"][$id_buscado]["INSCRITOS"]);?></span>
                    </label>
                    <button type="submit" class=" mt-10 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Guardar
                    </button>
                    

                </form>

            </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/src/models/logout.js"></script>
    <SCRipt src="/src/models/modelsScripts/tablaMaterias.js"></SCRipt>
</body>

</html>