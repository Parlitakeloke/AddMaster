<?php
include("conectardb.php");

$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : null;

$miConsulta = $miPDO->prepare('SELECT administrador FROM usuario WHERE id_usuario = :id_usuario;');
$parametros = array(

    ':id_usuario' => $codigo
    
);
$miConsulta->execute($parametros);

$dato = $miConsulta->fetch();


if($dato['administrador'] == 0){

    $miConsulta = $miPDO->prepare('UPDATE usuario SET administrador = 1 WHERE id_usuario = :id_usuario');
    $parametros = array(

        ':id_usuario' => $codigo
        
    );
    $miConsulta->execute($parametros);

}else{

    $miConsulta = $miPDO->prepare('UPDATE usuario SET administrador = 0 WHERE id_usuario = :id_usuario');
    $parametros = array(

        ':id_usuario' => $codigo
        
    );
    $miConsulta->execute($parametros);

}

header('Location: ../usuarios.php');
exit;
?>