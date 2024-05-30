<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./CSS/registerlogin.css">
    <link rel="icon" href="./Imagenes/logo.png" type="image">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="./JS/validation.js"></script>
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

    <div class="info-pop-up oculto" id="notiinfo">
        <div class="botonX">
            <div class="divbotonX">
                <button id="cerrarnotiinfo">
                    &times; 
                </button>
            </div>
        </div>
        <div class="info-general">

            <div class="titulillos">
                <i>ERABILTZAILEA:</i>
            </div>

            <div class="parrafos-erab">
                <p> - Erabiltzaile izenak 1 eta 12 arteko karaktere kopurua izan behar du</p>
    
                <p> - Gutxienezko letra larrizko karaktere 1</p>
    
                <p> - Gutxienezko letra xehezko karaktere 1</p>
            </div>

            <div class="titulillos">
                <i>EMAIL-A:</i>
            </div>

            <div class="parrafos-email">
                <p> - @ izan behar du</p>

                <p> - .com | .es | .eus</p>

                <p> - Adibidez: froga@fptxurdinaga.eus</p>
            </div>

            <div class="titulillos">
                <i>PASAHITZA:</i>
            </div>

            <div class="parrafos-email">
                <p> - Gutxienez 8 karaktereko kopurua</p>

                <p> - Gutxienezko letra larrizko karaktere 1</p>

                <p> - Gutxienezko letra xehezko karaktere 1</p>

                <p> - Gutxienez zenbaki 1</p>
            </div>

        </div>
    </div>

    <div class="notificacion oculto" id="Noti">

            <i class='bx bxs-error-circle'></i>
            <span id="MensajeNoti"></span>
            <button id="cerrarnoti">
                &times; 
            </button>
                
    </div>
    
    <section class="container">


        <form action="Controller/registerController.php" id="registerformularioa" method="POST">

            <h1>Erregistroa</h1>

            <div class="cajainput">
                <input type="text" placeholder="Erabiltzailea" name="nombre" id="Nom" required title="Erabiltzaile izena ez da egokia. Irakurri mesedez beharrezkoak diren ezaugarriak." pattern="^(?=.*[A-Z])(?=.*[a-z]).{1,12}$">
            </div>
            
            <div class="cajainput">
                <input type="text" placeholder="Email-a" name="email" id="Email" required title="Email-a ez ditu ezaugarriak betetzen. Mesedez idatzi helbide zuzen bat." pattern="^\w+([\.-]?\w+)*@(?:\w+\.){1}(com|es|eus)$">
                <i class='bx bxs-user'></i>
            </div>

            <div class="cajainput">
                <input type="password" placeholder="Pasahitza" name="pass" id="Clave" required title="Pasahitzak ez ditu beharrezkoa diren ezaugarriak betetzen." pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$">
                <i class='bx bxs-lock-alt' ></i>
            </div>

            <div class="cajainput">
                <input type="password" placeholder="Errepikatu pasahitza" name="Pass" id="Clave2" required title="Pasahitzak ez ditu beharrezkoa diren ezaugarriak betetzen." pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$">
                <i class='bx bxs-lock-alt' ></i>
            </div>

            <button type="submit" class="btn" id="ErrBTN">Erregistratu</button>

            <div class="saioa-hasi-link">
                <p>Kontua duzu? <a href="Login.php">Hasi saioa</a></p>
            </div>

            <div class="info">
                <i class='bx bxs-info-circle' id="infoicono"></i>
            </div>

        </form>

 

    </section>

</body>

</html>
