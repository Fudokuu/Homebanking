<?php


require 'DbConnection.php';

require 'header.php';

// Recupera i dati passati tramite il metodo POST
$numeroConto = $_SESSION['NumeroConto'];
$daData = $_POST['data_inizio'];
$aData = $_POST['data_fine'];

// Query per ottenere i movimenti nell'intervallo di date
// Query con prepared statement
$query = "SELECT * FROM Movimenti WHERE NumeroConto = ? AND DataRegistrazione BETWEEN ? AND ?";
$stmt = $con->prepare($query);
$stmt->bind_param("iss", $numeroConto, $daData, $aData);
$stmt->execute();
$movimenti = $stmt->get_result();


if ($movimenti->num_rows > 0) {
    // Se ci sono movimenti, visualizzali in una tabella
    echo "<h2>Movimenti per il conto $numeroConto dal $daData al $aData</h2>";
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

// Chiude la connessione
$stmt->close();
$con->close();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">