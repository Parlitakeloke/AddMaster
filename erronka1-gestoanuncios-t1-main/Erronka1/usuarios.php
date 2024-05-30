<?php include("Controller/usuariosController.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/usuarios.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
<?php include("layouts/header.php") ?>
    <div class="container">
        <br>
        <div class="tabla">
            <table>
                <tr>
                    <th>Erabiltzaile Izena</th>
                    <th>Email</th>
                    <th>Administradorea</th>
                    <th>Rolak</th>
                    <th>Aukerak</th>
                </tr>
                <?php foreach ($miConsulta as $clave => $valor) : ?>
                    <tr>
                        <td><?= $valor['nombre']; ?></td>
                        <td><?= $valor['email']; ?></td>
                        <td><?php

                            if ($valor['administrador'] == 0) {
                                echo ("No");
                            } else {

                                echo ("Si");
                            }

                            ?></td>
                        <td class="as">
                            <a class="button" href="../Erronka1/Controller/modificarController.php?codigo=<?= $valor['id_usuario'] ?>">Aldatu Rola</a>
                        </td>
                        <td class="as">
                        <a class="button" href="javascript:void(0);" onclick="mostrarPopup(<?= $valor['id_usuario'] ?>)">Ezabatu</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div id="confirmPopup" class="popup" style="display: none;">
    <div class="popup-content">
        <p>¿Ziur zaude erabiltzaile hau ezabatu nahi duzula?</p>
        <button id="confirmBtn" class="popupbotones" onclick="eliminarUsuario()">Bai</button>
        <button id="cancelBtn" class="popupbotones" onclick="ocultarPopup()">Ez</button>
    </div>
</div>

    <?php include("layouts/footer.php") ?>
</body>

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
        window.location.href = `../Erronka1/Controller/eliminarController.php?codigo=${usuarioId}`;

    }
</script>
</html>