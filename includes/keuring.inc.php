<?php
if (isset($_POST["submitupdate"])) {

    $id = htmlEntities($_POST["hiddenid"]);

    require_once 'database.php';
    $sql = "UPDATE reservatie SET control='1' WHERE id=$id";
    if (mysqli_query($db, $sql)) {
        header("location: ../adminpage.php");
    }
}
if (isset($_POST["submitdelete"])) {
    $id = $_POST["hiddenid"];
    require_once 'database.php';
    $sql2 = "DELETE FROM reservatie WHERE id=$id";
    if ($db->query($sql2) === TRUE) {
        header("location: ../adminpage.php");
    }
}
else {
    header("location: ../adminlogin.php");
}