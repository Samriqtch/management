<?php
    include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="">username</label>
        <input type="text" name="username" >
        <label for="">password</label>
        <input type="text" name="password">
        <input type="submit" value="connect" name="ok">



    </form>    

</body>
</html>
<?php
// si je clique sur le bouton ok je lis les valeurs des champs username et password
// je les compare avec les valeurs admin et admin
if(isset($_POST["ok"])) {
    session_start();
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Hash the password for security
    // In a real application, you would check the hashed password against a database
    $st = $pdo ->query("SELECT * FROM user WHERE login = '$username' AND password = '$password'");
    if($st->rowCount() > 0) {
        $_SESSION["login"] = $username;
        header("Location: home.php");
    } else {
        // Invalid credentials, redirect to login page or show an error message
        header("Location: login.php");// automatically redirect to login page
        // Optionally, you can display an error message
        echo "Invalid username or password";
    }
}