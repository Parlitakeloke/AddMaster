<?php
include("conectardb.php");

$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : null;
// Consulta SQL para eliminar los anuncios relacionados con el usuario
$consulta_eliminar_anuncios = $miPDO->prepare('DELETE FROM anuncio WHERE id_usuario = :id_usuario');
$parametros_eliminar_anuncios = array(
    ':id_usuario' => $codigo
);
$consulta_eliminar_anuncios->execute($parametros_eliminar_anuncios);

// Prepara DELETE
$miConsulta = $miPDO->prepare('DELETE FROM usuario WHERE id_usuario = :id_usuario');
//Parametros

$parametros = array(

    ':id_usuario' => $codigo
    
);

// Ejecuta la sentencia SQL
$miConsulta->execute($parametros);
// Redireccionamos al PHP con todos los datos
header('Location: ../usuarios.php');
exit;
?>