<?php
require_once "includes/database.php";
session_start();
if (isset($_SESSION["id"])){
    header("location: adminpage.php");
}
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
<form id="reserverenformv2" action="includes/login.inc.php" method="POST">
    <h1 class="formtitel">Login:</h1>
    <div class="adminlogin">
        <input type="text" placeholder="Gebruikersnaam"  name="username">
        <input type="password" placeholder="Wachtwoord" name="password">
        <button id="loginbutton" type="submit" name="submitadmin">Log in!</button>
    </div>
</form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "") {
            echo "<p>Gelieve alle velden in te vullen!</p>";
        }
        else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Er is iets misgegaan , probeer opnieuw!</p>";
        }
        else if ($_GET["error"] == "wronglogin") {
            echo "<p>Foute invoergegevens</p>";
        }
    }
    ?>
</div>

</body>

</html>
