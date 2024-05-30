<?php
include("Controller/categoriaSortuController.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./Imagenes/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/iragarkiakSortu.css">
    <title>Kategoria Sortu</title>
</head>

<body>
    <?php include("layouts/header.php"); ?>

    <h1 class="tituloh1">
        <center>Kategoria Sortu</center>
    </h1>
    <div class="formulario-container centrado">
        <form method="post" enctype="multipart/form-data" class="formulario">
            <label for="titulo">Kategoria Izena:</label>
            <input type="text" id="titulo" name="titulo" required>
            <div class="bton">
                <input type="submit" value="Gorde">
            </div>
        </form>
    </div>
    <div id="popup" class="popup">
        <div class="popup-content">
            <p>Kategoria gorde egin da.</p>
            <button id="btnAceptar">Onartu</button>
        </div>
    </div>
    <br>
    <br>
    <br>

    <?php include("layouts/footer.php"); ?>

    <script>
        // Función para mostrar el popup
        function mostrarPopup() {
            var popup = document.getElementById('popup');
            popup.style.display = 'block';
        }

        // Cuando se haga clic en el botón "Aceptar", ocultar el popup
        document.getElementById('btnAceptar').addEventListener('click', function() {
            // Cambiar la ubicación del navegador a la otra página PHP
            window.location.href = 'categorias.php';
        });
        // Verificar si se debe mostrar el popup y ejecutar la función
        <?php if (isset($successMessage)) { ?>
            mostrarPopup();
        <?php } ?>
    </script>
</body>

</html>