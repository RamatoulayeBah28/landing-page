<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = 'Ramatoulaye.bah2805@gmail.com';
    $subject = 'New Contact Form Submission';
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/html\r\n";

    $email_message = "<html><body>";
    $email_message .= "<h2>Contact Form Submission</h2>";
    $email_message .= "<p><strong>Name:</strong> {$name}</p>";
    $email_message .= "<p><strong>Email:</strong> {$email}</p>";
    $email_message .= "<p><strong>Message:</strong> {$message}</p>";
    $email_message .= "</body></html>";

    if (mail($to, $subject, $email_message, $headers)) {
        echo "Message sent successfully";
    } else {
        echo "Error sending message";
    }
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}

