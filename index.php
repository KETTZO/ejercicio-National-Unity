<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical Test</title>
    <link rel="stylesheet" href="./styles/index.css">
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
            <a href="">Registros</a>
            <a href="./register.php">Registrar</a>
            <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="dropdown" id="myDropdown">
            <a href="">Registros</a>
            <a href="./register.php">Registrar</a>
        </div>
    </header>
    <section class="records">
        <div class="container">
        <?php
            // Incluir el archivo de conexión
            include './Backend/config.php';

            // Consulta SQL para obtener los datos
            $sql = "SELECT title, info, idRecords FROM records WHERE status = 1";
            $result = $conn->query($sql);

            // Mostrar los datos en las cards
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<h2>" . $row["title"] . "</h2>";
                    echo "<p>" . $row["info"] . "</p>";
                    echo "<div class='buttons'>";
                    echo "<form action='./Backend/delete.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row["idRecords"] . "'>";
                    echo "<input type='submit' value='Eliminar'>";
                    echo "</form>";
                    echo "<form action='edit.php' method='get'>";
                    echo "<input type='hidden' name='id' value='" . $row["idRecords"] . "'>";
                    echo "<input type='hidden' name='title' value='" . $row["title"] . "'>";
                    echo "<input type='hidden' name='info' value='" . $row["info"] . "'>";
                    echo "<input type='submit' value='Editar'>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "No se encontraron resultados";
            }
            $conn->close();
            ?>
        </div> 
    </section>
    <div id="myModalCheck" class="modal">
            <div class="modal-content">
                <p><i class="fas fa-check"></i> Acción exitosa</p>
            </div>
    </div>
    <div id="myModalWrong" class="modal">
        <div class="modal-content">
            <p><i class="fas fa-times"></i> Algo salió mal</p>
        </div>
    </div>
</body>
<script>
    window.onload = function() {
        console.log("hola")
        var usuarioRegistrado = "<?php echo isset($_SESSION['successful']) ? $_SESSION['successful'] : '' ?>";
        console.log(usuarioRegistrado)
        if (usuarioRegistrado) {
            var modal = document.getElementById("myModalCheck");
            modal.style.display = "block";
            setTimeout(function() {
                modal.style.display = "none";
                <?php unset($_SESSION["successful"]); ?>
            }, 3000); // Cerrar la ventana modal después de 3 segundos (3000 milisegundos)

        };

        var usuarioNoRegistrado = "<?php echo isset($_SESSION['unsuccessful']) ? $_SESSION['unsuccessful'] : '' ?>";
        if (usuarioNoRegistrado) {
            var modal = document.getElementById("myModalWrong");
            modal.style.display = "block";
            setTimeout(function() {
                modal.style.display = "none";
                <?php unset($_SESSION["unsuccessful"]); ?>
            }, 3000); // Cerrar la ventana modal después de 3 segundos (3000 milisegundos)

        };
    };
</script>
<script src="./js/validation.js"></script>
<script src="./js/dropdownMenu.js"></script>
</html>
<?exit();?>