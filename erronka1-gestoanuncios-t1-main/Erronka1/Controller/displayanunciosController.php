<?php
include("conectardb.php");

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$anuncios_por_pagina = 4;
$inicio = ($page - 1) * $anuncios_por_pagina;

$miConsulta = $miPDO->prepare("SELECT * FROM anuncio LIMIT :inicio, :anuncios_por_pagina");
$miConsulta->bindParam(':inicio', $inicio, PDO::PARAM_INT);
$miConsulta->bindParam(':anuncios_por_pagina', $anuncios_por_pagina, PDO::PARAM_INT);
$miConsulta->execute();
?>

