<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['update'])) {
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['adress'];

        $sql = "UPDATE client SET fullname = ?, phone = ?, adress = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$fullname, $phone, $address, $id]);

        header("Location: view.php?id=" . $id);
    } else {
        $st = $pdo->query("SELECT * FROM client WHERE id = " . $id);
        $client = $st->fetch(PDO::FETCH_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Client</h2>
        <form method="post" class="shadow p-4 rounded bg-light">
            <div class="mb-3">
                <label for="fullname" class="form-label">Fullname:</label>
                <input type="text" name="fullname" class="form-control" value="<?php echo isset($client) ? $client['fullname'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" value="<?php echo isset($client) ? $client['phone'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" name="adress" class="form-control" value="<?php echo isset($client) ? $client['adress'] : ''; ?>" required>
            </div>
            <div class="text-center">
                <input type="submit" name="update" value="Update" class="btn btn-primary">
            </div>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>