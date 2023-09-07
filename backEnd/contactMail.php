<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $message = sanitizeInput($_POST["message"]);
    
    if (!empty($name) && !empty($email) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $to = "riyadh@areksa.com";
            $subject = "New Contact Form Submission from $name";
            $headers = "From: $email\r\n";
            
            $mailContent = "Name: $name\n";
            $mailContent .= "Email: $email\n\n";
            $mailContent .= "Message:\n$message";
            
            if (mail($to, $subject, $mailContent, $headers)) {
                 $response = "Message sent successfully!";
                 header("Location: ../contact.html"); // Redirect to contact.html
                 exit; // Important to exit after redirection
            } else {
                echo "Message could not be sent.";
            }
        } else {
            echo "Invalid email address.";
        }
    } else {
        echo "All fields are required.";
    }
}

function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>
