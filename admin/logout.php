<?php

include("../config.php");
session_start();

echo "Logout Successfully ";
session_destroy();   // Sessie wordt gestopt
CloseCon();
header("Location: login.php");

?>

