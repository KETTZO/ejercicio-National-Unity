<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';
    include 'validation.php';
    $title = $_POST["title"];
    $info = $_POST["info"];
    if(validation($title, $info)){
        $sql = "INSERT INTO records (title, info) VALUES ('$title', '$info')";
        if ($conn->query($sql) === TRUE) {
            echo "Datos guardados correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    
        session_start();
        $_SESSION["usuario_registrado"] = true;
        // Redirigir a la página principal
        header("Location: ../register.php");
        exit();
    } else {
        session_start();
        $_SESSION["usuario_no_registrado"] = true;
        // Redirigir a la página principal
        header("Location: ../register.php");
    };
    
}
?>

