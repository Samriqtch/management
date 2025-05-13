<?php
// filepath: c:\xamppmysql\htdocs\management\add.php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['adress'];

    // Gestion de l'upload de la photo
    $photo = $_FILES['photo']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO client (fullname, phone, adress, photo) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$fullname, $phone, $address, $photo]);

        header("Location: home.php");
        exit();
    } else {
        $error = "Erreur lors de l'upload de la photo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Ajouter un Client</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
            <div class="mb-3">
                <label for="fullname" class="form-label">Fullname:</label>
                <input type="text" name="fullname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="adress" class="form-label">Adresse:</label>
                <input type="text" name="adress" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo:</label>
                <input type="file" name="photo" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Ajouter</button>
                <a href="home.php" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>