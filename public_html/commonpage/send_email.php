<?php
include($_SERVER['DOCUMENT_ROOT'].'/lib/PHPMailer/mailconfig.php');

// Create a new instance of PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Rest of your code
function sendMail($recipient, $name, $subject, $message){
    global $mail; // Add this line to access the $mail object

    $mail->addAddress($recipient, $name); 
    $mail->isHTML(true); 
    $mail->Subject = $subject;
    $mail->Body = $message;
  
    if ($mail->send()) {
        $response['message'] = 'Email sent successfully';
    } else {
        $response['error'] = "Mailer Error: " . $mail->ErrorInfo;
    }
    // Set JSON content type and output JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

$recipient = $_POST['recipient'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$name = $_POST['name'];

$response = [];
// Call the sendMail function
sendMail($recipient, $name, $subject, $message);
?>
