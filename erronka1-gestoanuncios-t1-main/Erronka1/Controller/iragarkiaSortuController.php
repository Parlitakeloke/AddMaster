<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('Controller/conectardb.php');
    // Obtener datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];
    $id_usuario = $_SESSION['idUsuario'];
    $file_name = $_FILES['imagen']['name'];
    $file_path = $_FILES['imagen']['tmp_name'];
    $categoria = $_POST["categoria"];

    if ($file_path && $file_name) {
        $target_dir = "../media/";
        $target_file = $target_dir . basename($file_name);

        if (move_uploaded_file($file_path, $target_file)) {
            // Verificar si se ha cargado una imagen
            $sql = "INSERT INTO anuncio (titulo, descripcion, fecha_inicio, fecha_final, imagen, id_usuario, categoria) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $miPDO->prepare($sql);

            // Vincular parámetros
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $descripcion);
            $stmt->bindParam(3, $fecha_inicio);
            $stmt->bindParam(4, $fecha_final);
            $stmt->bindParam(5, $file_name); // Guarda solo el nombre del archivo
            $stmt->bindParam(6, $id_usuario);
            $stmt->bindParam(7, $categoria);

            // Ejecutar la consulta
            $stmt->execute();

            // Indicar que los datos se han guardado correctamente
            $successMessage = "Datuak ondo gorde egin dira.";
        } else {
            //FALTA HACER UNA VALIDACION AQUI
            echo "Error argazkia igotzean.";
        }
    } else {
        echo "Ez duzu aukeratu argazkia.";
    }
}