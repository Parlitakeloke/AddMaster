<?php include("Controller/categoriasController.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./Imagenes/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Orokorra.css">
    <link rel="stylesheet" href="CSS/usuarios.css">
    <link rel="stylesheet" href="CSS/header.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Kategoriak</title>
</head>
<body>
    <?php include("layouts/header.php"); ?>

    <div class="container">
        <br>
        <div class="tabla">
            <table>
                <tr>
                    <th>Kategoriaren Izena</th>
                    <th>Ezabatu</th>
                </tr>
                <?php foreach ($miConsulta as $clave => $valor) : ?>
                    <tr>
                        <td><?= $valor['nombre']; ?></td>
                        <td class="as">
                        <a class="button" href="javascript:void(0);" onclick="mostrarPopup(<?= $valor['id_categoria'] ?>)">Ezabatu</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div id="confirmPopup" class="popup" style="display: none;">
    <div class="popup-content">
        <p>¿Kategoria hau ezabatu nahi duzu?</p>
        <button id="confirmBtn" class="popupbotones" onclick="eliminarUsuario()">Bai</button>
        <button id="cancelBtn" class="popupbotones" onclick="ocultarPopup()">Ez</button>
    </div>
</div>

    <?php include("layouts/footer.php"); ?>

    <script>
    function mostrarPopup(usuarioId) {
        document.getElementById('confirmPopup').style.display = 'block';
        document.getElementById('confirmBtn').setAttribute('data-usuario-id', usuarioId);
    }

    function ocultarPopup() {
        document.getElementById('confirmPopup').style.display = 'none';
    }

    function eliminarUsuario() {
        const usuarioId = document.getElementById('confirmBtn').getAttribute('data-usuario-id');
        window.location.href = `../Erronka1/Controller/eliminarCategoriaController.php?codigo=${usuarioId}`;
    }
</script>
</body>
</html>