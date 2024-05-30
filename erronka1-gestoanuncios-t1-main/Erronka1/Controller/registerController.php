<?php
include('conectardb.php');
session_start();

$admin = 0;
$error = 0;
$hassedPassword = hash('sha512', $_POST['pass']);
if (!empty($_POST['nombre']) && !empty($_POST['pass'])) {

    $nireInsert = $miPDO->prepare('INSERT INTO usuario (nombre, email, contrasena, administrador) VALUES (:nombre, :email, :pass, :administrador)');
    $parametros = array(
        ':nombre' => $_POST['nombre'],
        ':email' => $_POST['email'],
        ':pass' => $hassedPassword,
        ':administrador' => $admin
    );

    if ($nireInsert->execute($parametros)) {
        // Registro exitoso, muestra el mensaje emergente
        $_SESSION['popup_message'] = 'Zorionak, erregistratu egin zara.';
    } else {
        $error = 1;
        $_SESSION['codigoerror'] = 1;
    }

    header('Location: ../register.php');
    exit;
} else {
    $error = 1;
    $_SESSION["codigoerror"] = 1;
    header('Location: ../register.php');
    exit;
}
