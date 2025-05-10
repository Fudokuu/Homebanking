<?php
// processaRegistrazione.php

require 'DBConnection.php'; // Assicurati che il percorso sia corretto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Recupera i dati inviati dal form
  $cognome = isset($_POST['Cognome']) ? trim($_POST['Cognome']) : null;
  $nome = isset($_POST['Nome']) ? trim($_POST['Nome']) : null;
  $codiceFiscale = isset($_POST['CodiceFiscale']) ? trim($_POST['CodiceFiscale']) : null;
  $dataNascita = isset($_POST['DataNascita']) ? trim($_POST['DataNascita']) : null;
  $genere = isset($_POST['Genere']) ? trim($_POST['Genere']) : null;
  $email = isset($_POST['Email']) ? trim($_POST['Email']) : null;
  $password = isset($_POST['Password']) ? trim($_POST['Password']) : null;
  $confermaPassword = isset($_POST['Conferma_Password']) ? trim($_POST['Conferma_Password']) : null;

  
  // Verifica che la password e la conferma corrispondano
  if ($password !== $confermaPassword) {
    die('La password e la conferma password non corrispondono.');
  }

  // Hash della password
  $passwordHash = password_hash($password, PASSWORD_BCRYPT);

  // Query di inserimento
  $query = "INSERT INTO utente (Cognome, Nome, CodiceFiscale, DataNascita, Genere, Email, Password) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $con->prepare($query);
  $stmt->bind_param('sssssss', $cognome, $nome, $codiceFiscale, $dataNascita, $genere, $email, $passwordHash);

  // Esegui la query
  if ($stmt->execute()) {
    echo 'Registrazione completata con successo.';
    header("Location: login.html");
    exit();
  } else {
    echo 'Errore durante la registrazione.';
  }
} else {
  echo 'Metodo di richiesta non valido.';
}

?>