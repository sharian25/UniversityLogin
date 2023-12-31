<?php
session_start();
if (!isset($_SESSION["user-data"])) {
    header("location: /src/views/Logout.php");
    exit();
}



$_SESSION["id"] = $_GET['id'];
$id=$_SESSION["id"];

require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php"); //conexión a la base de datos
$query = "
select
	  mc.ID_MAESTROS ,mc.ID_CLASES, c.CLASE 
from
	maestros_clases mc
inner join clases c ON 
	mc.ID_CLASES = c.ID_CLASES 
where
	mc.ID_MAESTROS = :id;
";
$smtnt = $pdo->prepare($query);
$smtnt->bindParam(":id", $id, PDO::PARAM_INT);
$smtnt->execute();
$inscritas = $smtnt->fetchAll(PDO::FETCH_ASSOC);

$query = "
select
  c.ID_CLASES , c.CLASE  
from
  clases c
left join maestros_clases mc on
  c.ID_CLASES = mc.ID_CLASES and mc.ID_MAESTROS = :id
where mc.MC_ID is null;
";
$smtnt = $pdo->prepare($query);
$smtnt->bindParam(":id", $id, PDO::PARAM_INT);
$smtnt->execute();
$faltantes = $smtnt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/dist/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/6838e0d0bd.js" crossorigin="anonymous"></script>
    <script src="/src/models/logout.js"></script>
    <title>Master-Assing</title>
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

        <p class="bg-white max-w-screen-sm h-14 text-sm p-2 rounded">Bienvenido <br>
            Selecciona la accion que quieras realizar en las pestañas del menu de la izquierda</p>

            <div class="content">
    <div class="row">
      <div class="flex justify-around col-sm-12 col-md-12 col-lg-12 col-lx-12">
        <div class="justify-center items-center flex flex-col">
          <h2 class="font-bold">Materias Asignadas</h2>
          <table class="border-separate border-spacing-2 border border-slate-400 ">
            <thead>
              <tr>
                <th class="border border-slate-300 ...">CLASES</th>
                <th class="border border-slate-300 ...">ACCION</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($inscritas as $inscrita) {
              ?>
                <tr>
                  <td class="border border-slate-300"><?= $inscrita["CLASE"] ?></td>
                  <td class="border border-slate-300">
                    <form action="/src/models/Create_Edit/DesasignarClaseM.php" method="post">
                      <input type="number" name="id_clases" hidden value="<?= $inscrita["ID_CLASES"] ?>">
                      <button type="submit" class="bg-red-200">Retirar materia</button>
                    </form>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>

        </div>
        <div class="justify-center items-center flex flex-col">
          <h2 class="font-bold mt-20">Materia Disponibles:</h2>
          <table class="border-separate border-spacing-2 border border-slate-400 ...">
            <thead>
              <tr>
                <th class="border border-slate-300 ...">CLASES</th>
                <th class="border border-slate-300 ...">ACCIONE</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($faltantes as $faltante) {
              ?>
                <tr>
                  <td class="border border-slate-300 ..."><?= $faltante["CLASE"] ?></td>
                  <td class="border border-slate-300 ...">
                    <form action="/src/models/Create_Edit/AsignarClaseM.php" method="post">
                      <input type="number" name="id_clases" hidden value="<?= $faltante["ID_CLASES"] ?>">
                      <button type="submit" class="secondary-roudend-full bg-green-200">Asignar esta Clase</button>
                    </form>

                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>


        </div>


      </div>
    </div>
  </div>

    </div>
            
</body>

</html>