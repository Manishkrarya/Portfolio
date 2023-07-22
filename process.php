<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and sanitize the data
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    // Set your email address where you want to receive the form submissions
    $to = "manishkumar3161@gmail.com";

    // Set the email subject
    $subject = "New Contact Form Submission - $subject";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Subject: $subject\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers
    $headers = "From: $name <$email>\n";
    $headers .= "Reply-To: $email";

    // Send the email
    mail($to, $subject, $email_content, $headers);

    // Redirect to a thank you page
    header("Location: index.html");
    exit;
}
?>
