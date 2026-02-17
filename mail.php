<?php
require 'vendor/autoload.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);

        try {
            // SMTP Settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; 
            $mail->SMTPAuth   = true;
            
            // Your Credentials
            $mail->Username   = 'freepluginsnet@gmail.com'; 
            $mail->Password   = 'tkhs syze txte whyn'; 
            
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // --- EMAIL 1: For You (Admin Notification) ---
            $mail->setFrom('freepluginsnet@gmail.com', 'Gemini System');
            $mail->addAddress('talha.jcodex@gmail.com'); 
            $mail->isHTML(true);
            $mail->Subject = 'New Newsletter Subscription Received';
            $mail->Body    = "A new user has subscribed to your newsletter.<br><br><b>Subscriber Email:</b> {$email}";
            $mail->send();

            // Clear for the next email
            $mail->clearAddresses();

            // --- EMAIL 2: For Subscriber (Welcome Email) ---
            $mail->addAddress($email); 
            $mail->Subject = 'Welcome to Gemini!';
            
            // Using your site's color scheme
            $mail->Body = "
            <div style='background-color: #000; padding: 40px; font-family: Arial, sans-serif; color: #ffffff; text-align: center;'>
                <div style='margin-bottom: 20px;'>
                    <img src='https://gemini.fwh.is/images/logo.png' alt='Gemini Logo' style='width: 150px; margin-bottom: 20px;'>
                </div>
                <h1 style='color: #ff6a00; font-size: 28px;'>Welcome to the Future of Crypto!</h1>
                <p style='font-size: 16px; color: #bebebe; line-height: 1.6;'>
                    Thank you for subscribing to Gemini. You will now receive the latest updates, 
                    insights, and news directly in your inbox.
                </p>
                <div style='margin: 35px 0;'>
                    <a href='https://gemini.fwh.is' style='background-color: #ff6a00; color: #000000; padding: 14px 30px; text-decoration: none; border-radius: 50px; font-weight: bold; font-size: 16px;'>Explore More</a>
                </div>
                <hr style='border: 0; border-top: 1px solid #333; margin: 30px 0;'>
                <p style='font-size: 12px; color: #666;'>
                    Gemini Crypto Company, LLC © 2026. All rights reserved.<br>
                    NMLS #1518126 | NMLS #2403509
                </p>
            </div>";

            $mail->send();
            echo 'success';

        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Invalid email address';
    }
}
?>