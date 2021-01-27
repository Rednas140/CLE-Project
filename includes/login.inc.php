<?php
if (isset($_POST["submitadmin"])) {

    $username = htmlEntities($_POST["username"]);
    $passwrd= htmlEntities($_POST["password"]);

    require_once 'database.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $passwrd) !== false){
        header("location: ../adminlogin.php?error=emptyinput");
        exit();
    }
    loginGebruiker($db, $username, $passwrd);
}

elseif (isset($_POST["create"])){
    $usrname = htmlEntities($_POST["username"]);
    $psswrd = htmlEntities($_POST["password"]);
    require_once 'database.php';
    require_once 'functions.inc.php';
}

else {
    header("location: ../adminlogin.php");
}

