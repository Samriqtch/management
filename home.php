<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white p-3 vh-100" style="width: 250px;">
            <h3 class="text-center">Menu</h3>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="home.php" class="nav-link text-white">Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="add.php" class="nav-link text-white">Ajouter un Client</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="profile.php" class="nav-link text-white">Mon Profil</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="logout.php" class="nav-link text-white">Déconnexion</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <h2 class="text-center mb-4">Liste des Clients</h2>
            <div class="mb-3 text-end">
                <a href="add.php" class="btn btn-success">Ajouter un Client</a>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Fullname</th>
                        <th>Phone</th>
                        <th>Adresse</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $st = $pdo->query("SELECT * FROM client");
                    while($row = $st->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $row["fullname"]; ?></td>
                        <td><?php echo $row["phone"]; ?></td> 
                        <td><?php echo $row["adress"]; ?></td>
                        <td>
                            <img src="uploads/<?php echo $row['photo']; ?>" alt="photo" class="img-thumbnail" width="50" height="50" onerror="this.onerror=null; this.src='default.jpg';">
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
