<?php

require_once "includes/database.php";
?>
<!DOCTYPE html>

<html>

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
    <title>Laura's Happy Home</title>

</head>

<body>
<header>
    <div class="navbar">
        <p class="logo" >Laura's Happy Home</p>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="reserveren.php">Reserveren</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="content">
<form id="adminlogin" action="includes/login.inc.php" method="POST">
    <h1 class="formtitel">Login:</h1>
    <div class="adminlogin">
        <p><input type="text" placeholder="Gebruikersnaam"  name="admingebruikers"></p>
        <p><input type="text" placeholder="Wachtwoord" name="adminwachtwoord" type="password"></p>
        <p><button type="submit" name="submitadmin">Log in!</button></p>
    </div>
</form>
    <?php
    $adminnaam = $_POST["admingebruikers"];
    $adminww = $_POST["adminwachtwoord"];
    echo "$adminnaam $adminww";
    ?>
</div>

</body>

</html>
