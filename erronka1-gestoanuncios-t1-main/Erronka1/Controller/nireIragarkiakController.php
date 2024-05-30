<?php
include("Controller/conectardb.php");

$sql = "SELECT * FROM anuncio WHERE id_anuncio = :anuncioId";
    $stmt = $miPDO->prepare($sql);
    $stmt->bindParam(':anuncioId', $anuncioId, PDO::PARAM_INT);
    $stmt->execute();

$result = $miPDO->query($sql);
?>