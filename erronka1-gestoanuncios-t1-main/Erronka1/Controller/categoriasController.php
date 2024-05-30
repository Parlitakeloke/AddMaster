<?php
session_start();

include("conectardb.php");

$miConsulta = $miPDO->prepare('SELECT * FROM categoria;');
$miConsulta->execute();



?>