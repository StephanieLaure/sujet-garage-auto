

<?php 



$name= $_POST['nom'];
$surname= $_POST['prenom'];
$message= $_POST['message'];
$email= $_POST['email'];
$subject= $_POST['subject'];

require_once 'images/config_projet.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/phpmailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username= _APP_EMAIL_;
    $mail->Password= 'jvdesbqhbplcizjl';
    $mail->SMTPSecure='ssl';
    $mail->Port= 465;
    $mail->setFrom(_APP_EMAIL_, $name, $surname);
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject= $subject;
    $mail->Body= $message;
    $mail->send();

    
}

echo " <script>
    alert('message envoyé');

    document.location.href='ecfgarage.php';
    </script>"







  ?>