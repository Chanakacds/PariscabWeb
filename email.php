<?php 
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
  require 'vendor/autoload.php'; 
  
$mail = new PHPMailer();

$from = $_POST['qc_from'];
$to = $_POST['qc_to'];
var_dump($from);
$firstName=$_POST['firstname'];
$lastName =$_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$note = $_POST['note'];
$passengers = $_POST['passengers'];
$date = $_POST['date'];
$time = $_POST['time'];
$luggages = $_POST['luggages'];

$subj= $from. ' - '.$to;
$body=$firstName.' '.$lastName." <br> ".$email." <br> ".$phone." <br> Pickup From : ".$from."<br> Drop off : ".$to. " <br> Number of Passengers : ".$passengers.
" <br> Pickup date : ".$date." <br> Pickup time : ".$time. "<br> Number of luggages: " .$luggages;
  
try {
    $mail->SMTPDebug = 3;                                 
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                              
    $mail->UserName = 'Chanaka@Test.com';                 
    $mail->Password = 'password';                           
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;
    
    $mail->setFrom('Chanaka@Test.com',"password");
    $mail->addAddress('Sender email');                  
    $mail->isHTML(true);                                 
    $mail->Subject = "$subj";
    $mail->Body    = "$body";


    $mail->SMTPDebug = 3;                                 
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                              
    $mail->UserName = 'Chanaka@Test@gmail.com';                 
    $mail->Password = 'password';                           
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;
    
    $mail->setFrom('Chanaka@Test@gmail.com',"Pariscab Service");
    $mail->addAddress($email);  
    var_dump($email) ;               
    $mail->isHTML(true);                                 
    $mail->Subject = "$subj";
    $mail->Body    = "$body";

    $mail->send();
        echo"<script>alert(\"Your email has been sent, thank you!\")</script>";
        header("Location:/pariscabweb2/booking.php");
    }
 catch (Exception $e) {
        echo"<script>alert(Please try again!\")</script>";
}
