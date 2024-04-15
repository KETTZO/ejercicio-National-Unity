<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical Test</title>
    <link rel="stylesheet" href="./styles/register.css">
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <div class="topnav" id="myTopnav">
            <span>Bienvenido</span>
            <a href="./index.php">Registros</a>
            <a href="">Registrar</a>
            <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="dropdown" id="myDropdown">
            <a href="./index.php">Registros</a>
            <a href="./register.php">Registrar</a>
        </div>
    </header>
    <section class="register">
        <form action="./Backend/update.php" method="POST" onsubmit="return validarTitulo()">
            <?php
            $title = $_GET['title'] ?? 'title';
            $id = $_GET['id'] ?? 'title';
            $info = $_GET['info'] ?? 'info';
            ?>
            <h2>Editando <?php echo $title; ?></h2>
            <div>
                <label for="title">Título</label>
                <input type="text" id="title" name="title" maxlength="30" placeholder="Máximo 30 caracteres y solo admite palabras" value="<?php echo $title; ?>">
                <p id="errorTitulo">El título no puede estar vacío y solo puede contener palabras</p>
            </div>
            <div>
                <label for="info">Descripción</label>
                <textarea id="info" name="info" rows="4" cols="50" maxlength="100" placeholder="Máximo 100 caracteres y acepta cualquier tipo de carácter"><?php echo $info; ?></textarea>
                <!--input type="textarea" id="info" name="info" placeholder="Máximo 100 caracteres y acepta cualquier tipo de carácter"-->
            </div>
            <input type="hidden" name='id' value="<?php echo $id; ?>">
            <input type="submit" id="submit" value="Actualizar">
        </form>
    </section>
        <!-- Ventana modal -->
        <div id="myModal" class="modal">
        <div class="modal-content">
            <p>Usuario registrado</p>
        </div>
    </div>
</body>
<script src="./js/validation.js"></script>
<script src="./js/dropdownMenu.js"></script>
</html>