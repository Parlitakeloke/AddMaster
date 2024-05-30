<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./CSS/registerlogin.css">

    <!-- Favicon dinamico -->
    <link rel="icon" type="image" href="./Imagenes/logo.png">
    <!-- BoxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="./JS/register.js"></script>
</head>

<body>

<?php
        if (isset($_SESSION['popup_message'])) {
            echo '<div id="popup" class="popup">
                    <div class="popup-content">
                        <p>' . $_SESSION['popup_message'] . '</p>
                        <button type="submit" id="btnAceptar" onclick="aceptarPopUp()">Aceptar</button>
                    </div>
                </div>';
            unset($_SESSION['popup_message']);
        }
?>

    <section class="container">

        <form action="Controller/loginController.php" method="post">
            <h1>HASI SAIOA</h1>
            <div class="cajainput">
                <input type="text" placeholder="Erabiltzailea" name="nombre" id="inputusu" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="cajainput">
                <input type="password" placeholder="Pasahitza" name="pass" id="inputpasahitza" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <button type="submit" class="btn" id="botonsaiohasi">Saioa Hasi</button>

            <div class="saioa-hasi-link">
                <p>Ez duzu konturik? <a href="register.php">Erregistratu </a></p>
            </div>
        </form>

    </section>
</body>

</html>
