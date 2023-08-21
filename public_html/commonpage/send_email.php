<?php 
    $recipient = $_POST['recipient'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $name = $_POST['name'];

    $msg = "From: ".$name.',<br>'.$message;
    $headers = "From: support@aaravix.com";

    if (mail($recipient, $subject, $message, $headers)) {
        echo json_encode(['message' => 'Email sent successfully']);
    } else {
        echo json_encode(['error' => 'Email sending failed']);
    }
