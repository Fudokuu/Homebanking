<?php

require __DIR__ . '/../src/DbConnection.php';

require __DIR__ . '/../include/header.php';

// Recupera i dati passati tramite il metodo POST
$numeroConto = $_SESSION['NumeroConto'];

// Query per ottenere i movimenti nell'intervallo di date
// Query con prepared statement
$query = "SELECT * FROM Movimenti WHERE NumeroConto = ? AND Causale LIKE '%imposta%' OR Causale LIKE '%imposte%' ";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $numeroConto);
$stmt->execute();
$movimenti = $stmt->get_result();


if ($movimenti->num_rows > 0) {
    // Se ci sono movimenti, visualizzali in una tabella
    echo "<h2>Movimenti per il conto $numeroConto contenenti la parola Imposta o imposte</h2>";
    echo "<table border='2'>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Causale</th>
                <th>Importo</th>
                <th>Credito/Debito</th>
            </tr>";

    while ($row = $movimenti->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ID']}</td>
                <td>{$row['DataRegistrazione']}</td>
                <td>{$row['Causale']}</td>
                <td>{$row['Importo']}</td>
                <td>{$row['CD']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    // Se non ci sono movimenti, mostra un messaggio
    echo "<p>Nessun movimento trovato per il periodo selezionato.</p>";
}