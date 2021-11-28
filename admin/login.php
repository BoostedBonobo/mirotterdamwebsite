<?php
session_start();
if(isset($_SESSION['use']))   // Kijken of er al een sessie bezig is
{
    header("Location:admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="../assets/css/admin.css" rel="stylesheet">
    <?Php  include("../assets/php/config.php") ?>
</head>
<body>
<h1>Login Pagina</h1>

<div class="logindiv">
    <form id="Loginform" method="post">
        <label for="naam">Gebruikersnaam: </label><br>
        <input type="text" name="naam"><br><br>
        <label for="wachtwoord">Wachtwoord: </label><br>
        <input type="password" name="wachtwoord"><br><br>
        <input type="submit" name="LoginButton" class="button" value="Login" />
    </form>
</div>


<?php
if(array_key_exists('LoginButton', $_POST)) {
    checkForm();
}
?>
</body>
</html>
