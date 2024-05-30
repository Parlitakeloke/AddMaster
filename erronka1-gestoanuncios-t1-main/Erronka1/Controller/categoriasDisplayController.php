<?php
include("conectardb.php");

$misCategorias = $miPDO->prepare('SELECT * FROM categoria;');
$misCategorias->execute();



?>