<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Modal Example</title>
</head>
<body class="flex flex-col items-center;">
    <h2>este es el ejemplo de un modal</h2>
    <button id="openModalBtn">Abrir Modal</button>
    <div id="myModal" class="hidden fixed w-full h-full bg-[rgba(172,232,240,0.7)] z-[1] left-0 top-0;">
        <div class="bg-white border w-4/5 max-w-[600px] relative mx-auto my-[10%] p-5 rounded-[20px] border-solid border-[#888];">
            <span class="absolute text-xl cursor-pointer right-2.5 top-2.5;" id="closeModalBtn">&times;</span>
            <h2>Este es un modal</h2>
            <p>Contenido del modal...</p>
             <fieldset>
                <legend>
                    ejemplo
                </legend>
                <label for="">
                    ingresa un valor
                </label>
                <input type="text">
                <button>Click me</button>
             </fieldset>
        </div>
    </div>
    <script src="/scrip.js"></script>
</body>
</html>
