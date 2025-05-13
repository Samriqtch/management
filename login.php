<?php
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger text-center"><?php echo $error; ?></div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="ok" class="btn btn-primary w-100">Login</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Si je clique sur le bouton ok, je lis les valeurs des champs username et password
if (isset($_POST["ok"])) {
    session_start();
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Hash the password for security

    // Vérification des identifiants dans la base de données
    $st = $pdo->prepare("SELECT * FROM user WHERE login = ? AND password = ?");
    $st->execute([$username, $password]);

    if ($st->rowCount() > 0) {
        $_SESSION["login"] = $username;
        header("Location: home.php");
        exit();
    } else {
        // Identifiants invalides
        $error = "Invalid username or password";
    }
}
?>