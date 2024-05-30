<?php
session_start();
include("conectardb.php");

$miConsulta = $miPDO->prepare('SELECT * FROM usuario;');
$miConsulta->execute();



?>