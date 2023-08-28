<?php 
    require './lib/PHPMailer/PHPMailerAutoload.php';

    $recipient = $_POST['recipient'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $name = $_POST['name'];
    
    $msg = "From: " . $name . ', ' . $message;
    
    // Create a new PHPMailer instance
    $mail = new PHPMailer;
    
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'team.aaravix@gmail.com'; // Your SMTP username
    $mail->Password = 'S@njurocks224'; // Your SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    
    $mail->setFrom('team.aaravix@gmail.com', 'Aaravix Support');
    $mail->addAddress($recipient, $name); // Recipient's email and name
    
    $mail->Subject = $subject;
    $mail->Body = $msg;
    
    $response = []; // Initialize response array
    
    if ($mail->send()) {
        $response['message'] = 'Email sent successfully';
    } else {
        $response['error'] = 'Email sending failed: ' . $mail->ErrorInfo;
    }
    
    // Set JSON content type and output JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    ?>
    