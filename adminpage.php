<?php
require_once "includes/database.php";
session_start();

if (is_null($_SESSION["id"])){
    header("location: index.php");
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

<body class="adminpagebody">
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
<div class="adminpage">
    <?php
        $sql = "SELECT * FROM reservatie;";
        $result = mysqli_query($db, $sql);
        $resultNumber = mysqli_num_rows($result);
        echo "<p class='admintext'>Er zijn op dit moment $resultNumber reserveringen</p>";
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Naam</th><th>Straat en huisnummer</th><th>Plaats</th><th>Email adres</th><th>telefoonnummer</th><th>Begin reservering</th><th>Eind reservering</th><th>Opmerkingen</th><th>Goedgekeurd</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                echo "<tr><td>" . $row["naam"]. "</td><td>" . $row["straat"]. "</td><td>" . $row["plaats"]. "</td><td>" . $row["email"]. "</td><td>" . $row["telefoon"]. "</td><td>" . $row["reserbegin"]. "</td><td>" . $row["resereind"]. "</td><td>" . $row["opmerking"]. "</td><td>"; if (isset($row["control"])){ echo "Ja";} else {echo "<form method='post' action='includes/keuring.inc.php'><input name='hiddenid' type='hidden' value='$id'/><input class='goedbutton' type='submit' name='submitupdate' value='Bevestig' /><input class='goedbutton' type='submit' name='submitdelete' value='Weiger' /></form>";} echo "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }


    ?>

</div>

</body>

</html>
