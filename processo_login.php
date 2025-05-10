<?php

require 'DbConnection.php';

    session_start();
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Verifica nel database
    $query = "SELECT * FROM conti WHERE Email = ? AND Password = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ii", $email , $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Conto trovato
        $_SESSION['Email'] = $email;
        $_SESSION['Password'] = $password;
        header("Location: Homepage.php");
        exit();
    } else {
        // Conto non trovato
        echo "conto non trovato";
        //header("Location: login.html?errore=1");
        exit();
    }
?>