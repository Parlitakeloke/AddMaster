    <?php
    if (isset($_SERVER['HTTP_REFERER'])) {
        $previousPage = $_SERVER['HTTP_REFERER'];
    } 
    ?>

    <?php
    include('Controller/conectardb.php');
    session_start();

    // Verifica si se proporciona un ID de anuncio válido en la URL
    if (isset($_GET['anuncio_id'])) {
        $anuncioId = $_GET['anuncio_id'];

        // Consulta a la base de datos para obtener los detalles del anuncio
        $sql = "SELECT * FROM anuncio WHERE id_anuncio = $anuncioId";
        $result = $miPDO->query($sql);

        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];
            $fechaInicio = $row['fecha_inicio'];
            $fechaFinal = $row['fecha_final'];
            $imagenURL = $row['imagen'];
            // Puedes agregar más campos aquí según tu base de datos
        } else {
            echo "Anuncio no encontrado.";
            exit;
        }
    } else {
        echo "ID de anuncio no proporcionado.";
        exit;
    }
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Detalles del Anuncio</title>
        <link rel="stylesheet" href="../Erronka1/CSS/Orokorra.css">
        <link rel="stylesheet" href="../Erronka1/CSS/DetallesAnuncios.css">
        <link rel="stylesheet" href="../Erronka1/CSS/header.css">
        <link rel="stylesheet" href="../Erronka1/CSS/footer.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>

    <body>
        <?php include("layouts/header.php"); ?>
        <a href="<?php echo $previousPage; ?>">Bueltatu</a>
        <div class="formulario-container">
            <div class="image-section">
                <img src="../media/<?php echo $imagenURL; ?>" alt="Iragarkiaren Argazkia">
            </div>
            <div class="details-section">
                <div class="formulario">
                    <label for="titulo">Titulua:</label>
                    <input type="text" value="<?php echo $titulo; ?>" readonly>

                    <label for="descripcion">Deskribapena:</label>
                    <textarea readonly><?php echo $descripcion; ?></textarea>
                    
                    <label for="fecha_inicio">Hasiera Data:</label>
                    <input type="text"  value="<?php echo $fechaInicio; ?>" readonly>

                    <label for="fecha_final">Amaiera Data:</label>
                    <input type="text"  value="<?php echo $fechaFinal; ?>" readonly>
                </div>
            </div>
            
        </div>
        <?php include("layouts/footer.php"); ?>
    </body>

    </html>

