<?php
class sendEmail extends config{

require $_SERVER['DOCUMENT_ROOT'].'/daap/vendor/phpmailer/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'].'/daap/vendor/phpmailer/src/SMTP.php';
require $_SERVER['DOCUMENT_ROOT'].'/daap/vendor/phpmailer/src/Exception.php';
require 'autoload.php';

    public function sendConfirmationEmail($studentName, $type, $transID){
        $mail = new PHPMailer(true);

        $body ="<p>Dear $studentName,</p>
        <p>Greetings of peace!</p>
        <p>You have successfully applied for the $type.</p>
        <p>Please take note of your scholarship reference number <b>$transID</b>.</p>
        <p>You may check the status of your application using our application status checker at the CEU DAAP Portal.</p>
        <p><b>This is an auto generated email please do not reply.</b></p>
        <p>Thank you and stay safe.</p>";

        try {
            //Server settings
            //Server settings
             $mail->SMTPDebug = SMTP::DEBUG_SERVER;
             $mail->isSMTP();
             $mail->Host       = 'smtp.gmail.com';     //platform
             $mail->SMTPAuth   = true;
             $mail->Username   = 'ceuscholarships@gmail.com';   //email
             $mail->Password   = 'jgjlnpbvworttwgn';                                //password
             $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
             $mail->Port       = 587;

             //Recipients
             $mail->setFrom('rcbolasoc@ceu.edu.ph');       //sender
             $mail->addAddress($email);

             //Content
             $mail->isHTML(true);
             $mail->Subject = 'Entrance Scholarship Application Received -'.$tn;
             $mail->Body    = $body;             //content

             $mail->send();
             echo "message has been sent";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function sendNewApplicationNotif(){

    }

}
 ?>
