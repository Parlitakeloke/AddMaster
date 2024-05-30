<?php

try{

    $hostDB = "127.0.0.1";
    $nombreDB = "db_anuncios";
    $usuarioDB = "root";
    $contrasenyaDB = "";

    $hostPDO = 
    "mysql:host=".$hostDB.";
    dbname=".$nombreDB.";";

    $miPDO = new PDO($hostPDO, $usuarioDB,$contrasenyaDB);


}catch(PDOException $e){

exit;
}

?>