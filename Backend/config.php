<?php

$conn = new mysqli("localhost", "root", "", "PracticalTest");
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    return $conn;
    
?>