<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Si l'utilisateur confirme la suppression
    if (isset($_POST['confirm'])) {
        $sql = "DELETE FROM client WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        header("Location: home.php");
        exit();
    }

    // Si l'utilisateur annule la suppression
    if (isset($_POST['cancel'])) {
        header("Location: home.php");
        exit();
    }
} else {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Client</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="text-center text-danger">Confirm Deletion</h2>
            <p class="text-center">Are you sure you want to delete this client?</p>
            <form method="post" class="text-center">
                <button type="submit" name="confirm" class="btn btn-danger me-2">Yes, Delete</button>
                <button type="submit" name="cancel" class="btn btn-secondary">Cancel</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>