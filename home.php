<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
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
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-info">View</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>
