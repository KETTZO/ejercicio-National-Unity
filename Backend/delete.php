<?php
// Verificar si se recibió el ID del registro a eliminar
if (isset($_POST['id'])) {
    // Conexión a la base de datos (suponiendo que tienes un archivo de configuración)
    include 'config.php';

    // Escapar el ID del registro para evitar inyección SQL
    $id = $conn->real_escape_string($_POST['id']);

    // Consulta SQL para eliminar el registro de la tabla
    $sql = "UPDATE records SET status=0 WHERE idRecords=$id";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION["successful"] = true;
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error al eliminar: " . $conn->error;
        session_start();
        $_SESSION["unsuccessful"] = true;
        header("Location: ../index.php");
        exit();
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>