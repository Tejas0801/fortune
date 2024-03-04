<?php
mb_internal_encoding("UTF-8");

$to = 'snani.1997@gmail.com'; // <-- Replace 'your_email@example.com' with your actual email address
$subject = 'Message from Fortune';

$name = "";
$email = "";
$phone = "";
$message = "";
$body = "";

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $body .= "Name: $name\n\n";
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $body .= "Email: $email\n\n";
}
if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
    $body .= "Phone: $phone\n\n";
}
if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $body .= "Message: $message\n\n";
}

$headers = "From: $email\r\n";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    mb_send_mail($to, $subject, $body, $headers);
    echo '<div class="status-icon valid"><i class="icon_check"></i></div>';
} else {
    echo '<div class="status-icon invalid"><i class="icon_close"></i></div>';
}
 // Send the email
 if (mail($to, $subject, $email_content, $email_headers)) {
    // Set a 200 (okay) response code
    http_response_code(200);
    echo "Thank You! Your message has been sent.";
} else {
    // Set a 500 (internal server error) response code
    http_response_code(500);
    echo "Oops! Something went wrong and we couldn't send your message.";
}
 else {
// Not a POST request, set a 403 (forbidden) response code
http_response_code(403);
echo "There was a problem with your submission, please try again.";
}
?>
