<?php
include("Controller/iragarkiaSortuController.php");
include("Controller/categoriasDisplayController.php");
?>


<!DOCTYPE html>
<html>

<head>
    <title>Iragarkia Sortu</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/iragarkiakSortu.css">
    <link rel="icon" type="image" href="./Imagenes/logo.png">
    <?php include("layouts/header.php") ?>
</head>

<body>
    <h1 class="tituloh1">
        <center>Iragarkia Sortu</center>
    </h1>
    <div class="formulario-container centrado">
        <form method="post"  enctype="multipart/form-data" class="formulario">
            <label for="titulo">Titulua:</label>
            <input type="text" id="titulo" name="titulo" required>

            <label for="categoria">Kategoria:</label>
            <select name="categoria" id="categoria">
                <?php foreach ($misCategorias as $claves => $valores) {

                    echo ("<option value='" . $valores["id_categoria"] . "'>" . $valores["nombre"] . "</option>");
                } ?>
            </select>

            <label for="descripcion">Deskripzioa:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

            <div class="fecha-inputs">
                <div class="fecha-input">
                    <label for="fecha_inicio">Hasiera data:</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" required>
                </div>
                <div class="fecha-input">
                    <label for="fecha_final">Amaiera data:</label>
                    <input type="date" id="fecha_final" name="fecha_final" required>
                </div>
            </div>
            <!-- <input type="hidden" name="id_usuario" value="<?php echo $idUsuario;?>"> -->
            <label for="imagen">Argazkiak:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" >

            <div class="bton">
                <input type="submit" value="Gorde">
            </div>
        </form>
    </div>
    <div id="popup" class="popup">
    <div class="popup-content">
        <p>Datuak ondo gorde egin dira.</p>
        <button id="btnAceptar">Onartu</button>
    </div>
</div>
    
<script>
    // Función para mostrar el popup
    function mostrarPopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'block';
    }

    // Cuando se haga clic en el botón "Aceptar", ocultar el popup
    document.getElementById('btnAceptar').addEventListener('click', function() {
        // Cambiar la ubicación del navegador a la otra página PHP
        window.location.href = 'NireIragarkiak.php';
    });
    // Verificar si se debe mostrar el popup y ejecutar la función
    <?php if (isset($successMessage)) { ?>
        mostrarPopup();
    <?php } ?>
</script>



</body>
<?php include("layouts/footer.php") ?>


</html>
