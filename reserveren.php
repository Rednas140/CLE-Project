<?php
require_once "includes/database.php";
session_start();
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
                <?php
                if (isset($_SESSION["id"])){
                    echo "<li><a href='adminpage.php'>Admin</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>Uitloggen</a></li>";

                }
                ?>
            </ul>
        </nav>
    </div>
</header>
<div class="content">
    <form id="reserverenformv2" action="includes/reserveren.inc.php" method="post">
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Reserveer:</h2>
            <h3 class="fs-subtitle">De contactgegevens</h3>
            <input type="text" name="naam" placeholder="Naam" />
            <input type="text" name="straat" placeholder="Straat en huisnummer" />
            <input type="text" name="plaats" placeholder="Plaats" />
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="telefoon" placeholder="Telefoonnummer" />
            <input type="button" name="next" class="next action-button" value="Volgende" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Reserveer:</h2>
            <h3 class="fs-subtitle">Selecteer de data vanaf wanneer en tot wanneer u wilt reserveren</h3>
            <input type="date" name="reserbegin" value="2021-03-01" min="2021-03-01" max="2021-11-01">
            <input type="date" name="resereind" value="2021-03-01" min="2021-03-01" max="2021-11-01">
            <input type="button" name="previous" class="previous action-button" value="Vorige" />
            <input type="button" name="next" class="next action-button" value="Volgende" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Reserveer:</h2>
            <h3 class="fs-subtitle">Heeft u nog verdere opmerkingen of vragen</h3>
            <input placeholder="Als u nog opmerkingen heeft kan u die hier noteren" name="opmerking">
            <input type="button" name="previous" class="previous action-button" value="Vorige" />
            <input onclick="return confirm('Heeft u alle informatie juist ingevuld en wilt u de reservering doorgeven?');" type="submit" name="submitreserveren" class="submit action-button" value="Verstuur"/>
        </fieldset>
        <script src="js/reserveren.js"></script>
    </form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p class='errortext'>Gelieve alle velden in te vullen!</p>";
        }
        else if ($_GET["error"] == "stmtfailed") {
            echo "<p class='errortext'>Er is iets misgegaan , probeer opnieuw!</p>";
        }
        else if ($_GET["error"] == "none") {
            echo "<p class='errortext'>U reservering is geslaagd, er zal binnen een paar dagen contact worden opgenomen door de eigenaars!</p>";
        }
    }
    ?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script><script  src="js/reserveren.js"></script>
</div>
</body>

</html>