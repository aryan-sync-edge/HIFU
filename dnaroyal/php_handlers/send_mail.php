<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../lp-hair-transplant/vendor/autoload.php'; // Adjust path if needed

// Get form data
$name = $_POST['mf-text'] ?? '';
$email = $_POST['mf-email'] ?? '';
$phone = $_POST['mf-telephone'] ?? '';

$comments = $_POST['mf-textarea'] ?? '';

$services_list = is_array($services) ? implode(", ", $services) : $services;

// === CONFIG ===
$company_email = 'aryanshirodkar03@gmail.com';     // ✅ Your business email
$from_email = 'aryanshirodkar03@gmail.com';            // ✅ Gmail for SMTP
$from_name = 'HIFU';               // ✅ Appears in "From"
$app_password = 'xwsi nvsp xgqr eusi';            // ✅ Gmail App Password (not your login!)

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $from_email;
    $mail->Password   = $app_password;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // 1. Send to Company
    $mail->setFrom($from_email, $from_name);
    $mail->addAddress($company_email);
    $mail->Subject = "New Contact Form Submission";
    $mail->Body    = "Name: $name\nEmail: $email\nPhone: $phone\nComments: $comments";
    $mail->send();

    // 2. Send Thank You to User
    $mail->clearAddresses();
    $mail->addAddress($email);
    $mail->Subject = "Thank You for Contacting Us";
    $mail->Body    = "Hi $name,\n\nThanks for contacting us We'll be in touch shortly.\n\nBest,\nYour Company Team";
    $mail->send();

    header("Location: ../lp-hair-transplant/index.html?status=success");
exit;

} catch (Exception $e) {
    http_response_code(500);
    echo "Mailer Error: " . $mail->ErrorInfo;
}
