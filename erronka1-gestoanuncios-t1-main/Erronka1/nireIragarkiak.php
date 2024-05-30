<?php
include('Controller/conectardb.php');
session_start();

if (isset($_SESSION['idUsuario'])) {
    $usuarioData;

    // Obtén los datos del usuario de la sesión
    $idUsuario =  $_SESSION['idUsuario'];

    // Consulta a la base de datos para obtener los datos actualizados del usuario
    $sql = "SELECT nombre, email, contrasena FROM usuario WHERE id_usuario = $idUsuario";
    $result = $miPDO->query($sql);

    if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $username = $row['nombre'];
        $email = $row['email'];
        $password = $row['contrasena'];
    }
}


// Procesar la actualización si se ha enviado el formulario
if (isset($_POST['actualizar'])) {
    // Obtén los valores actualizados del formulario
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];
    $idUsuario = $_SESSION['idUsuario'];
    $sql = "UPDATE usuario SET nombre = '$newUsername', email = '$newEmail', contrasena = '$newPassword' WHERE id_usuario = $idUsuario";
    // Ejecuta la consulta SQL
    $miPDO->query($sql);

    // Refresca la página
    header('Location: NireIragarkiak.php');
    exit;
}
?>

<?php
if (isset($_SESSION['idUsuario'])) {
    $idUsuario = $_SESSION['idUsuario'];
    $sql = "SELECT * FROM anuncio WHERE id_usuario = $idUsuario";
    $result = $miPDO->query($sql);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icono_logo.png">
    <link rel="icon" type="image" href="./Imagenes/logo.png">
    <title>AD MASTER</title>
    <link rel="stylesheet" href="../Erronka1/CSS/header.css">
    <link rel="stylesheet" href="../Erronka1/CSS/footer.css">
    <link rel="stylesheet" href="../Erronka1/CSS/nireIragarkiak.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<?php include("layouts/header.php");?>
<body>

    <h1>
        <center>NIRE DATUAK</center>
    </h1>

    <div class="user-section">
        <img class="logo_persona" src="Imagenes/persona_azul.png">

        <div class="user-form">
            <form class="formulario" method="post">
                <label for="username">Erabiltzaile izena:</label>
                <input type="text" id="username" name="username" placeholder="Zure erabiltzailea... " value="<?php echo $username; ?>" required>

                <label for="email">Helbide elektronikoa:</label>
                <input type="email" id="email" name="email" placeholder="Zure e-mail..." value="<?php echo $email; ?>" required>

                <label for="password">Pasahitza:</label>
                <input type="password" id="password" name="password" placeholder="Zure pasahitza..." value="<?php echo $password; ?>" required>

                <button type="button" class="gordebotoia" id="updateButton">Gorde</button>
                
                <div id="confirmPopup" class="popup">
                    <div class="popup-content">
                        <p>¿Ziur zaude aldaketak gorde nahi dituzula?</p>
                        <button id="confirmBtn" class="popupbotones" name="actualizar" method="post">Bai</button>
                        <button id="cancelBtn" class="popupbotones">Ez</button>
                    </div>
                </div>
            </form>
        </div>

    </div>


    <h1>
        <center>NIRE IRAGARKIAK</center>
    </h1>

    <div class="card__container2">
        <?php
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='card__item2'>";
                echo "<figure class='card__img2'>";
                echo "<img src='Imagenes/persona_azul.png' class='card__picture'>";
                echo "</figure>";
                echo "<h3 class='card__title2'>" . $row['titulo'] . "</h3>";
                echo "<p class='card__paragraph2'>" . $row['descripcion'] . "</p>";
                echo "<a href='detallesanuncio.php?anuncio_id=" . $row['id_anuncio'] . "'>Ikusi gehiago</a>";

                echo "</div>";
            }
        } else {
            echo  "Ez daude iragarkirik, SORTU BAT!!.";
        }
        ?>
         
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popup = document.getElementById('confirmPopup');
            const confirmBtn = document.getElementById('confirmBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const updateButton = document.getElementById('updateButton');
            const updateForm = document.querySelector('.formulario');

            updateButton.addEventListener('click', function() {
                popup.style.display = 'block';
            });

            confirmBtn.addEventListener('click', function() {
                // Envía el formulario cuando se confirme
                updateForm.submit();
                popup.style.display = 'none';
            });

            cancelBtn.addEventListener('click', function() {
                popup.style.display = 'none';
            });
        });
    </script>
</body>
<?php include("layouts/footer.php");?>
</html>
