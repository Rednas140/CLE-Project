<?php

function emptyInputReser($naam, $straat, $plaats, $email, $telefoon, $reserbegin, $resereind) {
    $result;
    if (empty($naam) || empty($straat) || empty($plaats) || empty($email) || empty($telefoon) || empty($reserbegin) || empty($resereind)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($db, $username) {
    $sql = "SELECT * FROM adminlogin WHERE username = ?;";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location../adminlogin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultdata)) {
        return $row;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputLogin($username, $passwrd) {
    $result;
    if (empty($username) || empty($passwrd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


function reserMaken($db, $naam, $straat, $plaats, $email, $telefoon, $reserbegin, $resereind, $opmerking) {
    $sql = "INSERT INTO reservatie (naam, straat, plaats, email, telefoon, reserbegin, resereind, opmerking) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($db);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../reserveren.php?error=stmtfailed");
            exit();
        }
            mysqli_stmt_bind_param($stmt, "ssssssss", $naam, $straat, $plaats, $email, $telefoon, $reserbegin, $resereind, $opmerking);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../reserveren.php?error=none");

}

function loginGebruiker($db, $username, $passwrd) {
    $uidExists = uidExists($db, $username);

    if ($uidExists === false) {
        header("location: ../adminlogin.php?error=wroglogin");
        exit();
    }

    $pwdHashed = $uidExists["password"];
    $checkpwd = password_verify($passwrd, $pwdHashed);

    if ($checkpwd === false) {
    header("location: ../adminlogin.php?error=wronglogin");
    exit();
    }
    elseif ($checkpwd === true) {
        session_start();
        $_SESSION["id"] = $uidExists["id"];
        $_SESSION["username"] = $uidExists["username"];
        header("location: ../adminpage.php");
        exit();
    }

}


