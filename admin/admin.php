<?php session_start();  ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin pagina</title>
    <link href="../assets/css/admin.css" rel="stylesheet">
    <?Php include("../assets/php/config.php") ?>
    <?php if(!isset($_SESSION['use'])){ header("Location:login.php");}?> <!-- als geen session -->
</head>
<body>
    <div class="header">
        <form method="post">
            <button style="float:right" type="submit" name="uitloggen" onclick="window.location.href='login.php'"> Uitloggen</button>
        </form>
        <?php if(array_key_exists('uitloggen', $_POST)) { session_destroy(); header("Location:login.php");}  ?> 
        <h3>Admin Pagina</h3>
    </div>  
    <p>Dit is de adminpage, hier moet nog aan gewerkt worden.</p>
    <br><br>

    <div class="tekstblok">
        <h3>Locaties</h3>
    </div>
    <div class="tekstblok1">
        <h3>Voeg locatie toe</h3>
    </div>
    <div class="tekstblok2">
        <h3>Verwijder locatie</h3>
    </div>

    <br><br>

    <div class="locaties">
    <?php
    locatiesFunc();
    ?>
    </div>

    <div class="locaties2">
        <form method="post" enctype="multipart/form-data">
            <label for="naam">Locatie naam: </label><br>
            <input type="text" name="naam"><br><br>
            <label for="fileToUpload" >Kies een afbeelding:</label><br><br>
            <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
            <input type="submit" value="Toevoegen" name="submit">
        </form>
    </div>

    <div class="locaties3">
        <form method="post">
            <label for="id">Locatie id: </label><br>
            <input type="text" name="id"><br><br>
            <input type="submit" value="Verwijderen" name="VerwijderButton">
        </form>
    </div>

    <?php
    if(array_key_exists('VerwijderButton', $_POST)) {
        VerwijderLocatie();
    }

    if(array_key_exists('submit', $_POST)) {
        LocatieToevoegen();
    }

    
?>
</body>
</html>
