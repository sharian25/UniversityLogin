<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/dist/output.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>Index</title>
</head>

<body>
    <main class="bg-[#fff4d4] h-screen flex flex-col justify-center items-center">
        <img src="/src/img/logo.jpg" alt="logo universidad" class="h-48 w-44 pb-5">
        <div class="h-64 w-96 bg-white shadow-slate-300  shadow-sm rounded-s">
            <form action="/src/controller/Controlador.php" class="flex flex-col justify-center p-5" method="post">
                <p class="text-center text-slate-[300]">Bienvenido Ingresa con tu contraseña</p>
                <div class="input-group flex items-center">
                    <span class="icon text-gray-500 pr-2"><i class="fas fa-envelope"></i></span>
                    <input name="email" type="email" placeholder="Correo electrónico" class="w-5/6 p-2 mx-5 my-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="input-group flex items-center">
                    <span class="icon text-gray-500 pr-2"><i class="fas fa-lock"></i></span>
                    <input name="pass" type="password" placeholder="Contraseña" class="w-5/6 p-2 mx-5 my-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <?php
                session_start();
                if (isset($_SESSION["nonyes"])) {
                    echo ($_SESSION["nonyes"]);
                unset($_SESSION["nonyes"]);
                }
                ?>
                <button type="submit" class=" bg-[#0080f8] text-white h-10 w-20 rounded ml-[270px] ">Ingresar</button>
            </form>


        </div>
    </main>
</body>

</html>