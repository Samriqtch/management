<?php
include("db.php");
$st = $pdo->query("SELECT * FROM client WHERE id = " . $_GET["id"]);
$row = $st->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Détails du Client</h2>
        <div class="card mx-auto" style="width: 24rem;">
            <img src="uploads/<?php echo $row['photo']; ?>" class="card-img-top img-thumbnail" alt="photo" onerror="this.onerror=null; this.src='default.jpg';">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["fullname"]; ?></h5>
                <p class="card-text"><strong>Téléphone :</strong> <?php echo $row["phone"]; ?></p>
                <p class="card-text"><strong>Adresse :</strong> <?php echo $row["address"]; ?></p>
                <p class="card-text"><strong>Photo :</strong></p>
                <img src="uploads/<?php echo $row['photo']; ?>" alt="photo" class="img-thumbnail" width="100" height="100" onerror="this.onerror=null; this.src='default.jpg';">
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="home.php" class="btn btn-primary">Retour à la liste</a>
        </div>
    </div>
</body>
</html>