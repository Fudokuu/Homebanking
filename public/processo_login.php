<?php

require __DIR__ . '/../src/DbConnection.php';

    session_start();
    $numero_conto = $_POST['NumeroConto'];

    // Verifica nel database
    $query = "SELECT * FROM conti WHERE NumeroConto = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $numero_conto);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Conto trovato
        $_SESSION['NumeroConto'] = $numero_conto;
        header("Location: Homepage.php");
        exit();
    } else {
        // Conto non trovato
        header("Location: login.html?errore=1");
        exit();
    }
?>