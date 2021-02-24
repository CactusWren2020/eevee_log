<?php 
session_start();

$errors = '';
$myemail = 'mike@mikecho.dev';
if (
    empty($_POST['first_name']) ||
    empty($_POST['last_name']) ||
    empty($_POST['email']) ||
    empty($_POST['request']) ||
    empty($_POST['message'])
) {
    $errors .= '\n Error: all fields are required';
    var_dump($errors);
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_address = $_POST['email'];
$request = $_POST['request'];
$message = $_POST['message'];

if (!preg_match(
    "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
    $email_address
)) {
    $errors .= "\n Error: invalid email address";
    var_dump($errors);
}
if (empty($errors)) {
    $to = $myemail;
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. " . "Here are the details: \n Name: $first_name $last_name \n" . "Email: $email_address \n $message";
    $headers = "From: $myemail\n";
    $headers = "Reply-To: $email_address";

    mail($to, $email_subject, $email_body, $headers);

    header("Location: ../contact.php");

    $_SESSION["flash"] = ["type" => "success", "message" => "Your message has been successfully sent."];
    
}
