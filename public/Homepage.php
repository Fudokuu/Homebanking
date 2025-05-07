
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Homepage</title>
</head>
<body>


    <h1>Benvenuto nella tua Homepage </h1>

    
    <?php require __DIR__ . '/../include/header.php'; ?>


    <div class="container mt-5">
        <h2>Movimenti Bancari</h2>
        
        <form method="POST" class="mb-4" action="MovimentiDatatoData.php">
            <div class="row">
                <div class="col-md-5">
                    <label for="data_inizio" class="form-label">Data Inizio</label>
                    <input type="date" class="form-control" id="data_inizio" name="data_inizio" required>
                </div>
                <div class="col-md-5">
                    <label for="data_fine" class="form-label">Data Fine</label>
                    <input type="date" class="form-control" id="data_fine" name="data_fine" required>
                </div>
                <div class="col-md-2 align-self-end">
                    <button type="submit" class="btn btn-primary">Cerca</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container mt-5">
    <h2>Movimenti Imposte</h2>
    <button><a href="movimentiImposte.php">Imposte</a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</body>
</html>