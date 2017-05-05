<html>
<body>
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
    
            Name<br><input type="text" name="name" placeholder="Enter Your Name">
            <br><br>
            To<br><input type="email" name="email" placeholder="Email address">
            <br><br>
           subject<br><input type="text" name="subject" placeholder="Enter subject">
           <br><br>
           <textarea name="message" cols="20" rows="3"></textarea>
           <br><br>
            <input type="submit" value="Send" name="send">
            <br><br>
           <a style="height:36px;widht:99.97px;float:right;" href="index.html">HOME</a>
    </form>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'overtblog1997@gmail.com';          // SMTP username
$mail->Password = 'aditya97deshpande'; 					// SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('overtblog1997@gmail.com', $_POST['name']);
$mail->addReplyTo('overtblog1997@gmail.com', $_POST['name']);
$mail->addAddress($_POST['email']);
//$mail->addAddress('yadneshkulkarni661@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Nice Work</h1>';
$bodyContent .= '<p>Excellent Work</b></p>';

$mail->Subject = $_POST['subject'];
$mail->Body=$_POST['message'];
//$mail->Body    = '<h1>Offer Letter</h1>';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}
?>