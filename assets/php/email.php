<?php
phpinfo();
mb_internal_encoding("UTF-8");

$to = 'snani.1997@gmail.com'; // <-- Replace 'snani.1997@gmail.com' with your actual email address
$subject = 'Message from Fortune';

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

$body = "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Phone: $phone\n";
$body .= "Message: $message\n";

$headers = "From: $email\r\n";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (mb_send_mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    http_response_code(400);
    echo "Invalid email address.";
}
?>
