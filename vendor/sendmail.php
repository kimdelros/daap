<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'autoload.php';

function configureMail($mail, $recepient){
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->isSMTP();
  $mail->Host       = 'smtp.gmail.com';     //platform
  $mail->SMTPAuth   = true;
  $mail->Username   = 'ceu.mls.daap@gmail.com';   //email
  $mail->Password   = 'lnmlcgfepelimbqr';                                //password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port       = 587;

  //Recipients
  $mail->setFrom($mail->Username);       //sender
  $mail->addAddress($recepient);
  
  return $mail;
}

function sendConfirmationEmail($studentName, $studentEmail, $type, $transID){
  $mail = new PHPMailer(true);

  $body ="<p>Dear $studentName,</p>
  <p>Greetings of peace!</p>
  <p>Congratulations on applying for the $type.</p>
  <p>Kindly take note of your tracking ID: <b>$transID</b> for your reference.</p>
  <p>We will send you an email once your application has been approved by the Office of the Registrar.<p>
  <p>You may check the status of your application using our <a href=\"https://port-seventeen.com/daap/status.php\">DAAP Status Checker</a>.</p>
  <p><b>This is an auto generated email please do not reply.</b></p>
  <p>Thank you and stay safe.</p>";

  try {
      //Server settings
      //Server settings
      $mail = configureMail($mail, $studentEmail);

       //Content
       $mail->isHTML(true);
       $mail->Subject = $type.' Application Received - '.$transID;
       $mail->Body    = $body;             //content

       $mail->SMTPDebug  = SMTP::DEBUG_OFF;
       $mail->send();
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

function notifyRegistrar($type, $transID){
  $mail = new PHPMailer(true);

  $body ="<p>Dear Registrar,</p>
  <p>Greetings of peace!</p>
  <p>This email is to notify you that you have received a new application.</p>
  <p>Information:</p>
  <p>Tracking ID: <b>$transID</b></p>
  <p>Application Type: <b>$type</b></p>
  <p><b>This is an auto generated email please do not reply.</b></p>
  <p>Thank you and stay safe.</p>";

  try {
      //Server settings
      //Server settings
      $mail = configureMail($mail, "drjemiahkim@gmail.com");

       //Content
       $mail->isHTML(true);
       $mail->Subject = 'Notification for Application - '.$transID;
       $mail->Body    = $body;             //content

       $mail->SMTPDebug  = SMTP::DEBUG_OFF;
       $mail->send();
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

function sendApprovedUpdate($studentName, $studentEmail, $transID){
  $mail = new PHPMailer(true);

  $body ="<p>Dear $studentName,</p>
  <p>Greetings of peace!</p>
  <p>I hope this email finds you well.</p>
  <p>We just want to update you, that your application $transID has been <b>approved</b>.</p>
  <p>This application is being submitted to the Accounting Office to apply the discount.</p>
  <p>You may check the status of your application using our <a href=\"https://port-seventeen.com/daap/status.php\">DAAP Status Checker</a>.</p>
  <p><b>This is an auto generated email please do not reply.</b></p>
  <p>Thank you and stay safe.</p>";

  try {
      //Server settings
      //Server settings
      $mail = configureMail($mail, $studentEmail);

       //Content
       $mail->isHTML(true);
       $mail->Subject = 'Update for the Application - '.$transID;
       $mail->Body    = $body;             //content

       $mail->SMTPDebug  = SMTP::DEBUG_OFF;
       $mail->send();
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

function sendHoldUpdate($studentName, $studentEmail, $reason, $transID){
  $mail = new PHPMailer(true);

  $body ="<p>Dear $studentName,</p>
  <p>Greetings of peace!</p>
  <p>I hope this email finds you well.</p>
  <due>We just want to update you, that your application $transID has been <b>on-hold</b> due to <b>$reason</b>.</p>
  <p>Kindly provide a new set of documents and you may upload them using the link below.</p>
  <a href=\"https://port-seventeen.com/daap/uploader.php\">Document Uploader</a>
  <p><b>This is an auto generated email please do not reply.</b></p>
  <p>Thank you and stay safe.</p>";

  try {
      //Server settings
      //Server settings
      $mail = configureMail($mail, $studentEmail);

       //Content
       $mail->isHTML(true);
       $mail->Subject = 'Update for the Application - '.$transID;
       $mail->Body    = $body;             //content

       $mail->SMTPDebug  = SMTP::DEBUG_OFF;
       $mail->send();
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

function sendRejectUpdate($studentName, $studentEmail, $transID){
  $mail = new PHPMailer(true);

  $body ="<p>Dear $studentName,</p>
  <p>Greetings of peace!</p>
  <p>I hope this email finds you well.</p>
  <p>We just want to update you, that your application $transID has been <b>rejected</b>.</p>
  <p><b>This is an auto generated email please do not reply.</b></p>
  <p>Thank you and stay safe.</p>";

  try {
      //Server settings
      //Server settings
      $mail = configureMail($mail, $studentEmail);

       //Content
       $mail->isHTML(true);
       $mail->Subject = 'Update for the Application - '.$transID;
       $mail->Body    = $body;             //content

       $mail->SMTPDebug  = SMTP::DEBUG_OFF;
       $mail->send();
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

function sendAccountingUpdate($studentName, $studentEmail, $transID){
  $mail = new PHPMailer(true);

  $body ="<p>Dear $studentName,</p>
  <p>Greetings of peace!</p>
  <p>I hope this email finds you well.</p>
  <p>We just want to update you, that your application $transID has been <b>discounted to your tuition fee</b>.</p>
  <p>Thank you for using our portal for this transaction.</p>
  <p>You may check your COM from these links:</p>
  <p><a href=\"https://caresmls.ceu.edu.ph/SERP\">Cares for Malolos Campus</a></p>
  <p><a href=\"https://caresmnl.ceu.edu.ph/SERP\">Cares for Manila Campus</a></p>
  <p><a href=\"https://caresmkt.ceu.edu.ph/SERP\">Cares for Makati Campus</a></p>
  <p><b>This is an auto generated email please do not reply.</b></p>
  <p>Thank you and stay safe.</p>";

  try {
      //Server settings
      //Server settings
      $mail = configureMail($mail, $studentEmail);

       //Content
       $mail->isHTML(true);
       $mail->Subject = 'Update for the Application - '.$transID;
       $mail->Body    = $body;             //content

       $mail->SMTPDebug  = SMTP::DEBUG_OFF;
       $mail->send();
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
