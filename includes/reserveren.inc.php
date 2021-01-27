<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

if (isset($_POST["submitreserveren"])) {
    $naam = htmlEntities($_POST["naam"]);
    $straat = htmlEntities($_POST["straat"]);
    $plaats = htmlEntities($_POST["plaats"]);
    $email = htmlEntities($_POST["email"]);
    $telefoon = htmlEntities($_POST["telefoon"]);
    $reserbegin = htmlEntities($_POST["reserbegin"]);
    $resereind = htmlEntities($_POST["resereind"]);
    $opmerking = htmlEntities($_POST["opmerking"]);

    require_once 'database.php';
    require_once 'functions.inc.php';



    if (emptyInputReser($naam, $straat, $plaats, $email, $telefoon, $reserbegin, $resereind) !== false){
        header("location: ../reserveren.php?error=emptyinput ");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../reserveren.php?error=invalidemail ");
        exit();
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '...';                     // SMTP username
        $mail->Password   = '...';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('Laura@happyhome.com', 'Lauras happy home');
        $mail->addAddress('sanderjverhoeven@gmail.com', 'Sander');     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Er is een nieuwe Reservering';
        $mail->Body    = "$naam heeft een nieuwe reservering gedaan.";
        $mail->AltBody = "$naam heeft een nieuwe reservering gedaan.";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    reserMaken($db, $naam, $straat, $plaats, $email, $telefoon, $reserbegin, $resereind, $opmerking);

}
else{
    header("location: ../index.php ");
    exit();
}

?>
