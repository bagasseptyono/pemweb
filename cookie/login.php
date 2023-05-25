<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
if ($_COOKIE) {
    echo "Anda sudah login";
    header("Location: home.php");
}
if ($_POST) {
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    setcookie("nama","$nama",time()+60);
    setcookie("password","$password",time()+60);
    header("Location: home.php");
}


?>
<body>
    <form action="login.php" method="post">
        <input type="text" name="nama" id="">
        <input type="password" name="password" id="">
        <input type="submit" value="Submit">
    </form>
</body>
</html>