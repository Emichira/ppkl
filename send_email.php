<?php
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
    $recipient = "emmanuelmichira@gmail.com";
    $subject = "New Contact Form Message";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    $headers = "From: $email";

    // Send the email
    mail($to, $subject, $body, $headers);
    or die("Failed to send message.");
    echo "Message sent successfully!";

    // if (mail($recipient, $subject, $body, $headers)) {
    //     echo "Message sent successfully!";
    // } else {
    //     echo "Failed to send message.";
    // }

?>
