<?php
header('Content-Type: text/html; charset=utf-8');
$to = 'pepto33@safe-mail.net';
$subject = $_POST['subject'];
$message = $_POST['message'];
$name = $_POST['name'];
$email = $_POST['email'];
//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$headers = 'From: pepto site <pepto3@000webhostapp.com>';
//$headers[] = 'Cc: birthdayarchive@example.com';
//$headers[] = 'Bcc: birthdaycheck@example.com';

//echo "Привет $name,<br>
//$subject,<br>
//$message,<br>
//$email<br>";
//if (mail($to, $subject, $message, 'f0575286@000webhostapp.com'))
if (mail($to, $subject, $message, 'pepto33@gmail.com'))
 {     print "mailok";
} else {
    print "mailerror";
}
//mail($to, $subject, $message, implode("\r\n", $headers));
?>