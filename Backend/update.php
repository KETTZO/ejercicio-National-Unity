<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title']) && isset($_POST['info']) && isset($_POST['id'])) {
    include 'config.php';
    include 'validation.php';

    $id = $conn->real_escape_string($_POST['id']);
    $title = $conn->real_escape_string($_POST['title']);
    $info = $conn->real_escape_string($_POST['info']);


    if(validation($title, $info)){
        $sql = "UPDATE records SET title='$title', info='$info' WHERE idRecords=$id";

        if ($conn->query($sql) === TRUE) {
            session_start();
            $_SESSION["successful"] = true;
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error al actualizar: " . $conn->error;
            session_start();
            $_SESSION["unsuccessful"] = true;
            header("Location: ../index.php");
            exit();
        }
        $conn->close();
    }
    else{
        session_start();
        $_SESSION["unsuccessful"] = true;
        header("Location: ../index.php");
        exit();
    }
} else {
    echo "Error: Datos incompletos title=" . $_POST['title'] . " id= " . $_POST['id'] . " info: " . $_POST['info'];
    session_start();
    $_SESSION["unsuccessful"] = true;
    header("Location: ../index.php");
    exit();
}
?>