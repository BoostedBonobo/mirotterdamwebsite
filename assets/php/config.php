<?php

function OpenCon(){
    $dbhost = "localhost";
    $dbuser = "username";
    $dbpass = "password";
    $db = "databasename";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}   
    
function CloseCon($conn){
    $conn -> close();
}


// <----- admin page functions ----->

function checkForm(){
    // form uitlezen
    $formNaam = $_POST["naam"];
    $formWachtwoord = $_POST["wachtwoord"];

    // $conn = mysqli_connect("localhost", "Bram", "marb20030426", "projectwebsite");
    $conn = OpenCon();

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM user WHERE Username = '$formNaam'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row == null or $formNaam ==  "" or $formWachtwoord == ""){
        echo "Ongeldige input, Probeer het opnieuw!";
    }
    else if($formNaam ==  $row["Username"] and $formWachtwoord == $row["Password"]){
        // Alleen openen als de gebruikersnaam gelijk is aan database en wachtwoord.
        $_SESSION['use']=$formNaam;
        header("Location:admin.php");
    }
    else {
        echo "Gebruiker bestaat of de gegevens zijn fout, Probeer het opnieuw!";
    }
    CloseCon($conn);
}

function locatiesFunc(){
    // $conn = mysqli_connect("localhost", "Bram", "marb20030426", "projectwebsite");
    $conn = OpenCon();
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT LocationId, Name, FileName FROM location ORDER BY LocationId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>Nr</th><th>Naam</th><th>Filenaam</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["LocationId"]. "</td><td>" . $row["Name"]. "</td><td>" . $row["FileName"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Geen resultaten gevonden in de database.";
    }

    CloseCon($conn);
}
       

function VerwijderLocatie (){
    $formID = $_POST["id"];
    // $conn = mysqli_connect("localhost", "Bram", "marb20030426", "projectwebsite");
    $conn = OpenCon();
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //afbeelding verwijderen uit de map
    // $sql = "SELECT filename FROM locaties WHERE id='$formID'";
    $sql = "SELECT FileName FROM location WHERE LocationId='$formID'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row != null) {
        $fileName = $row["filename"];
        unlink("uploads/" . $fileName);

        //locatie verwijderen uit de database
        $sql = "DELETE FROM location WHERE LocationId='$formID'";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        echo "Verwijderd";
    }
    CloseCon($conn);
}

function LocatieToevoegen(){
    $target_dir = "assets/img/location_images";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Bestand is een foto - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Bestand is geen foto.";
        $uploadOk = 0;
    }

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, Het bestand bestaat al.";
        $uploadOk = 0;
    }

// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, u bestand is te groot.";
        $uploadOk = 0;
    }

// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, alleen JPG, JPEG, PNG & GIF bestanden worden geaccepteerd.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, u bestand is niet geupload.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            uploadSQL();
            echo "Het bestand ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " is geupload.";
        } else {
            echo "Sorry, Error tijdens het uploaden.";
        }
    }
    CloseCon($conn);
}

function uploadSQL (){
    $fileName = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
    $locatieNaam = $_POST["naam"];

    // $conn = mysqli_connect("localhost", "Bram", "marb20030426", "projectwebsite");
    $conn = OpenCon();

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO location (Name,FileName) VALUES('$locatieNaam','$fileName')";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
    CloseCon($conn);
}
    ?>