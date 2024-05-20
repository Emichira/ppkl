<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the input
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Ensure email is valid
    if ($email === false) {
        echo "Invalid email address.";
        exit;
    }

    // Construct the email
    $recipient = "info@ppkl.net";
    $subject = "New Contact Form Message";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    $headers = "From: $email";

    // mail($to, $subject, $body, $headers);
    // or die("Failed to send message.");
    // echo "Message sent successfully!";

    // Send the email
    if (mail($recipient, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request.";
}
?>
