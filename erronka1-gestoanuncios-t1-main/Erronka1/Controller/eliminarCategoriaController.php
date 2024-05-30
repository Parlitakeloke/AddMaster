<?php
session_start();
include("conectardb.php");
$codigo = $_REQUEST['codigo'];

$miConsulta = $miPDO->prepare('DELETE FROM categoria WHERE id_categoria = :id_categoria');
//Parametros

$parametros = array(

    ':id_categoria' => $codigo
    
);

// Ejecuta la sentencia SQL
$miConsulta->execute($parametros);
// Redireccionamos al PHP con todos los datos
header('Location: ../categorias.php');
exit;
?>