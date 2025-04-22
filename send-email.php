<?php
$purpose = $_POST["purpose"] ?? '';
$name = $_POST["name"];
$contactPerson = $_POST["contactPerson"] ?? '';
$phone = $_POST["phone"];
$email = $_POST["email"];
$businessType = $_POST["businessType"] ?? '';
$address = $_POST["address"] ?? '';
$location = $_POST["location"] ?? '';
$message = $_POST["message"];
$currentURL = $_SERVER["HTTP_REFERER"] ?? '';
$message_body = "";
$success = -1;

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "webotixinternalstorage@gmail.com";
    $mail->Password = "zlbt puen gwox bqew";

    $mail->setFrom("webotixinternalstorage@gmail.com", "Webotix");
    $mail->addAddress("enjoyal@webotix.ae", "Webotix");

    $mail->Subject = "Thank you for contacting us!";
    // Create a message body
    $mail->isHTML(true);
    $message_body .= "<h1>Thank you for contacting us!</h1>";
    $message_body .= "<p>Purpose: $purpose</p>";
    if ($purpose === "business") {
        
        $message_body .= "<p><strong>Contact Person Name:</strong> $contactPerson</p>";
        $message_body .= "<p>Phone: $phone</p>";
        $message_body .= "<p>Email: $email</p>";
        $message_body .= "<p>Business Type: $businessType</p>";
        $message_body .= "<p><strong>Location:</strong> $location</p>";
        $message_body .= "<p>Message: $message</p>";
    } else {
        $message_body .= "<p>Name: $name</p>";
        $message_body .= "<p>Phone: $phone</p>";
        $message_body .= "<p>Email: $email</p>";
        $message_body .= "<p>Address : $address</p>";
        $message_body .= "<p>Location: $location</p>";
        $message_body .= "<p>Message: $message</p>";
    }
    $mail->Body = $message_body;

    $mail->send();

    $success = 1;
    // echo "Message has been sent successfully";

    // header("Location: success.html");
} catch (Exception $e) {
    $success = 0;
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // header("Location: error.html");
}

header("Location: $currentURL?success=$success#contact");
exit();
