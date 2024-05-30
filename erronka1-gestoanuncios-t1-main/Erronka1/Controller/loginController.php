<?php
session_start();
include('conectardb.php');

$usuario = $_POST['nombre'];
$contrasenia = hash('sha512', $_POST['pass']);

if (empty($usuario) || empty($contrasenia)) {
    // Si el usuario o la contraseña están en blanco, muestra un mensaje de error.
    $_SESSION['codigoerror'] = 2;
    $_SESSION['popup_message'] = 'Mesedez, sartu zure datuak.';
    header('Location: ../login.php');
    exit;
}

$miConsulta = $miPDO->prepare('SELECT * FROM usuario WHERE nombre = :nombre;');
$parametros = array(
    ':nombre' => $usuario
);
$miConsulta->execute($parametros);
$fila = $miConsulta->fetch();

if ($fila) {
    // El usuario existe en la base de datos, comprobamos la contraseña
    if ($contrasenia == $fila['contrasena']) {
        // Contraseña correcta
        $_SESSION['administrador'] = $fila['administrador'];
        $_SESSION['pass'] = $_POST['pass'];
        $_SESSION['usuario'] = $_POST['nombre'];
        $_SESSION['idUsuario'] = $fila['id_usuario'];
        $_SESSION['popup_message'] = 'Datuak zuzenak dira.';
        header('Location: ../hasiera.php');
        exit;
    } else {
        // Contraseña incorrecta
        $_SESSION['codigoerror'] = 2;
        $_SESSION['popup_message'] = 'Pasahitza ez da zuzena.';
        header('Location: ../login.php');
        exit;
    }
} else {
    // El usuario no existe en la base de datos
    $_SESSION['codigoerror'] = 2;
    $_SESSION['popup_message'] = 'Erabiltzailea ez da existitzen.';
    header('Location: ../login.php');
    exit;
}
?>
