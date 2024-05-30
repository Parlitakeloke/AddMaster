<?php
session_start();
include("conectardb.php");
   
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nireInsert = $miPDO->prepare('INSERT INTO categoria(nombre)VALUES(:nombre)');
$parametros = array(

    ':nombre' => $_POST["titulo"]

);
$nireInsert->execute($parametros);

$successMessage = "Kategoria gorde egin da.";
}
?>