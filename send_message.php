<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'gembalishivani@gmail.com'; 
        $mail->Password = 'ubww wshx fpbt rmag'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        
        $mail->setFrom('gembalishivani@gmail.com', 'Your Name');
        $mail->addAddress('gembalishivani@gmail.com'); 

        $mail->isHTML(true);
        $mail->Subject = "New Contact Message from $name";
        $mail->Body = "<strong>Name:</strong> $name <br> <strong>Message:</strong> <br>$message";

       
        if ($mail->send()) {
            echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
        } else {
            echo "<script>alert('Failed to send message. Please try again later.');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Mailer Error: " . $mail->ErrorInfo . "');</script>";
    }
} else {
    echo "<script>alert('Invalid request!');</script>";
}
?>
