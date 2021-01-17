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
    <form id="test" action="test.php" method="post">
        <input placeholder="Naam" name="naam"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $sql = "INSERT INTO reservatie (naam)
        VALUES ('" . $_POST["naam"] . "')";
        $result = mysqli_query($db,$sql);
    }
    ?>
    <p>in dit gedeelte komt alle content die de pagina heeft.</p>
</div>

</body>

</html>