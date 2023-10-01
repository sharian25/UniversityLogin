<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/dist/output.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    
    <title>Master-Page</title>
</head>

<body class="bg-blue-100 flex flex-col ">
    <div class="bg-white h-12 ml-48 flex">
        home
        <select class="ml-[85%]" id="logout" onchange="logout()">
            <option value="1"><?=$_SESSION["user-data"][0]["NOMBRE"]?></option>
            <option value="logout">logout</option>
            
        </select>
    </div>
    <div class=" h-screen w-48 fixed bg-blue-900 pt-20 flex flex-col justify-normal">
        <div class="border-b-2 border-b-blue-700 flex items-center pb-[-50px]">
            <img src="/src/img/logo.jpg" alt="logo" class=" rounded-full h-10 w-10 ml-2 mt-[-100px]">
            <span class="text-white ml-5 mt-[-100px]">Universidad</span>
        </div>
        <div class="text-white border-b-2 border-b-blue-700 h-20 flex justify-center flex-col">
            <h3 class="ml-5"><?=$_SESSION["user-data"][0]["NOMBRE"]?></h3>
            <span class="ml-5 text-xs">Administrador</span>
        </div>
        <div class="pt-5">
            <h2 class="text-center mb-4 text-white text-sm">Menu Administración </h2>
            <ul class="list-none pl-5">
                <li class="mb-2 hover:bg-sky-700"><a href="/src/views/views_admin/Permisos.php"     class="block text-white"><i class="fa-solid fa-user-gear"></i><span class="m-3">Permisos</span> </a></li>
                <li class="mb-2 hover:bg-sky-700"><a href="/src/views/views_admin/MaestrosDash.php" class="block text-white"><i class="fa-solid fa-chalkboard-user"></i><span class="m-3">Maestros</span> </a></li>
                <li class="mb-2 hover:bg-sky-700"><a href="/src/views/views_admin/AlumnosDash.php"  class="block text-white"><i class="fa-solid fa-graduation-cap"></i><span class="m-3">Alumnos</span> </a></li>
                <li class="mb-2 hover:bg-sky-700"><a href="/src/views/views_admin/Clases.php"       class="block text-white"><i class="fa-solid fa-chalkboard"></i><span class="m-3">Clases</span> </a></li>
            </ul>
        </div>

    </div>
    <div class="content ml-52 p-4 ">
        <div class="flex justify-between">
            <p class="text-xl mb-4 ">Lista de maestros</p>
            <a href="/src/views/views_admin/AdminDash.php" class=""><span class="text-blue-700">Home</span>/Dashboard</a>
        </div>
        <p class="bg-white max-w-screen-sm h-14 text-sm p-2 rounded">Bienvenido <br>
            Selecciona la accion que quieras realizar en las pestañas del menu de la izquierda</p>
    </div>
    <div class="container ml-52">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-lx-12">
                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th  class="centered">DNI</th>
                            <th  class="centered">NOMBRE</th>
                            <th  class="centered">CORREO</th>
                            <th  class="centered">DIRECCION</th>
                            <th  class="centered">TELEFONO</th>
                            <th  class="centered">NACIMIENTO</th>
                            <th  class="centered">ESTADO</th>
                            <th  class="centered">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody"></tbody>
                </table>

            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/6838e0d0bd.js" crossorigin="anonymous"></script>
    <script src="/src/models/logout.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="/src/models/modelsScripts/TablaMaestros.js"></script>
    
</body>

</html>