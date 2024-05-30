<header>
    <nav class="contenidonav">
        <img class="logo" src="Imagenes/logo_blanco.png">
        <h1>AD MASTER</h1>
        <div class="nav-dropdown">
            <button class="dropbtn">
                <i class='bx bx-menu bx-lg'></i>
            </button>
            <div class="dropdown-content">
                <a href="hasiera.php">Hasiera</a>
                <a href="iragarkiaSortu.php">Iragarkia Sortu</a>
                <?php if ($_SESSION['administrador'] == 1) {
                    echo ('<a href="categorias.php">Kategoriak</a>');
                    echo ('<a href="categoriaSortu.php">Kategoriak Sortu</a>');
                    echo ('<a href="usuarios.php">Erabiltzaileak</a>');
                } ?>
                <?php 
                if (isset($_SESSION['usuario'])) {
                echo ('<a href="itxisaioa.php">Itxi Saioa</a>');
                    }    else {
                    echo ('<a href="login.php">Saioa hasi</a>');
                    }
                ?>
            </div>
        </div>
    </nav>
</header>