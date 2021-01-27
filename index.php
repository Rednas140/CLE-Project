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

<body class="bodyindex">
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
<div class="contentindex">
<div class="slideshow-container">
    <div class="mySlides fade">
        <div class="numbertext">1 / 2</div>
        <img src="style/picture1.jpg" style="width:100%">
        <p class="imgtext">Caravan 1</p>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 2</div>
        <img src="style/picture2.jpg" style="width:100%">
        <p class="imgtext">Caravan 2</p>
    </div>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
</div>
    <p>Wij zijn familie Verhoeven en beschikken over een aangepaste stacaravan op RCN-camping "de Flaasbloem" in Chaam(NB).<br>
        De stacaravan is volledig aangepast en wij willen deze caravan graag aan met met of zonder beperking verhuren. <br>
        Om binnen te komen is er een oprijplaat en in de caravan zelf is er een tillift tot uw beschikking.
        Ook de badkamer aangepast en kunt u gebruik maken van een badstoel en steunen naast een verhoogd toilet. <br>
        Er zijn 2 slaapkamers: Eén slaapkamer heeft een stapelbed en een kledingkast.
        De andere slaapkamer heeft een volledig verstelbaar hoog-laagbed en een tweepersoonsbed. <br>
        De caravan heeft een ruime woonkamer waarin u met een rolstoel gemakkelijk kunt manoeuvreren.
        In de woonkamer staat een tv en een dvd-speler die u kunt gebruiken. <br>
        De keuken is van alle gemakken voorzien: o.a. magnetron, Senseo koffiezetapparaat en oventje zijn aanwezig.
        In de betegelde tuin staat een schommelstoel waarin u heerlijk kunt genieten van de natuur waarin de caravan staat.<br>
    </p>
</div>

<script src="js/indeximage.js"></script>

</body>

</html>
