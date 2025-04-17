<?php

$name = $_POST["name"] ?? '';
$phone = $_POST["phone"] ?? '';
$email = $_POST["email"] ?? '';
$message = $_POST["message"] ?? '';
$type = $_POST["options"] ?? '';

$company = $_POST["company_name"] ?? '';
$location = $_POST["location"] ?? '';

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // SMTP Setup
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "webotixinternalstorage@gmail.com";
    $mail->Password = "oxtvmslsnnkuuwoy";
    $mail->setFrom("webotixinternalstorage@gmail.com", "Webotix");

    // Route to different emails based on type
    if ($type === "business") {
        $mail->addAddress("business@example.com", "Business Team");
        $mail->Subject = "New Business Inquiry";
    } elseif ($type === "family") {
        $mail->addAddress("family@example.com", "Family Team");
        $mail->Subject = "New Family Inquiry";
    } elseif ($type === "individual") {
        $mail->addAddress("individual@example.com", "Individual Team");
        $mail->Subject = "New Individual Inquiry";
    } else {
        // Fallback
        $mail->addAddress("webotixinternalstorage@gmail.com", "Webotix");
        $mail->Subject = "General Contact Form";
    }

    $mail->isHTML(true);

    // Build Message Body
    $message_body = "<h2>New Inquiry Details</h2>";
    $message_body .= "<p><strong>Name:</strong> $name</p>";
    $message_body .= "<p><strong>Phone:</strong> $phone</p>";
    $message_body .= "<p><strong>Email:</strong> $email</p>";

    if ($type === "business") {
        $message_body .= "<p><strong>Company:</strong> $company</p>";
        $message_body .= "<p><strong>Location:</strong> $location</p>";
    } elseif ($type === "individual") {
        $message_body .= "<p><strong>Location:</strong> $location</p>";
    }

    $message_body .= "<p><strong>Message:</strong><br>$message</p>";

    $mail->Body = $message_body;
    $mail->send();

    header("Location: success.html");
} catch (Exception $e) {
    header("Location: error.html");
}
