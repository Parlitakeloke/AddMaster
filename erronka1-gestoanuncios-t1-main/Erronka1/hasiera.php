<?php
session_start();
include("Controller/displayanunciosController.php");

// Obtén las categorías desde la base de datos
$consultaCategorias = $miPDO->query("SELECT * FROM categoria");
$categorias = $consultaCategorias->fetchAll(PDO::FETCH_ASSOC);

// Control de visibilidad de categorías mediante una variable de sesión
if (isset($_GET['mostrarCategorias']) && $_GET['mostrarCategorias'] === 'true') {
    $_SESSION['mostrarCategorias'] = true;
}

if (isset($_GET['ocultarCategorias']) && $_GET['ocultarCategorias'] === 'true') {
    unset($_SESSION['mostrarCategorias']);
}

$mostrarCategorias = isset($_SESSION['mostrarCategorias']) ? true : false;

if (isset($_GET['busqueda'])) {
    $busqueda = '%' . $_GET['busqueda'] . '%';
    $parametros = array();
    $sql = "SELECT * FROM anuncio WHERE titulo LIKE :busqueda";
    $parametros[':busqueda'] = $busqueda;

    if (isset($_GET['categoria']) && $_GET['categoria'] != "") {
        $sql .= " AND categoria = :categoria";
        $parametros[':categoria'] = $_GET['categoria'];
    }

    $miConsulta = $miPDO->prepare($sql);
    
    foreach ($parametros as $param => $value) {
        $miConsulta->bindValue($param, $value, PDO::PARAM_STR);
    }

    $miConsulta->execute();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Imagenes/logo.png">
    <title>AD MASTER</title>
    <link rel="stylesheet" href="../Erronka1/CSS/Orokorra.css">
    <link rel="stylesheet" href="../Erronka1/CSS/header.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php include("layouts/header.php") ?>
    <div class="content">
        <div class="buscador">
            <form action="hasiera.php" method="get">
                <input type="text" placeholder="Buscar..." name="busqueda" class="input-busqueda">
                <?php if ($mostrarCategorias) : ?>
                    <select name="categoria">
                        <option value="">Kategoria guztiak</option>
                        <?php foreach ($categorias as $categoria) : ?>
                            <option value="<?= $categoria['id_categoria'] ?>"><?= $categoria['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <a href="hasiera.php?ocultarCategorias=true">
                        <i class='bx bx-filter'></i>
                    </a>
                <?php else : ?>
                    <a href="hasiera.php?mostrarCategorias=true">
                        <i class='bx bx-filter'></i>
                    </a>
                <?php endif; ?>
                <button class="btn-buscar" type="submit">Bilatu</button>
            </form>
        </div>

        <div class="card__container2">
            <?php foreach ($miConsulta as $clave => $valor) : ?>
                <div class="card__item2">
                    <figure class="card__img2">
                        <img src="Imagenes/persona_azul.png" class="card__picture">
                    </figure>
                    <h3 class="card__title2"><?= $valor['titulo']; ?></h3>
                    <p class="card__paragraph2">
                        <?= $valor['descripcion']; ?>
                    </p>
                    <a href="detallesanuncio.php?anuncio_id=<?= $valor['id_anuncio']; ?>">Ikusi gehiago</a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pagination">
            <?php
            $consulta_total = $miPDO->query("SELECT COUNT(*) as total_anuncios FROM anuncio");
            $resultado = $consulta_total->fetch(PDO::FETCH_ASSOC);
            $total_anuncios = $resultado['total_anuncios'];
            $total_paginas = ceil($total_anuncios / $anuncios_por_pagina);

            for ($i = 1; $i <= $total_paginas; $i++) : ?>
                <li class="pagination-item <?php if ($i == $page) {
                                                echo 'active';
                                            } ?>">
                    <a class="page-link" href="hasiera.php?page=<?php echo $i; ?>">
                        <?php
                        if ($i === 0) {
                            echo "&laquo;"; // Flecha hacia la izquierda
                        } elseif ($i === $total_paginas) {
                            echo "&raquo;"; // Flecha hacia la derecha
                        } else {
                            echo $i;
                        }
                        ?>
                    </a>
                </li>
            <?php endfor; ?>
        </div>

    </div>

    <?php include("layouts/footer.php") ?>
</body>

</html>
