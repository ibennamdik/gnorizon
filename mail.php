<?php 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

set_include_path("." . PATH_SEPARATOR . ($UserDir = dirname($_SERVER['DOCUMENT_ROOT'])) . "/pear/php" . PATH_SEPARATOR . get_include_path());
require_once "Mail.php";

$host = "mail.hacknigeria.com.ng";
$username = "admin@hacknigeria.com.ng";
$password = "RJ%_iOlN_pps";
$port = "465";
$to = "endee09@gmail.com";
$email_from = "admin@hacknigeria.com.ng";
$email_subject = "Subject Line Here: " ;
$email_body = "whatever you like" ;
$email_address = "endee09@gmail.com";

$headers = array (
'From' => $email_from, 
'To' => $to, 
'Subject' => $email_subject, 
'Reply-To' => $email_address);

$smtp = Mail::factory('smtp', array (
'host' => $host, 
'port' => $port, 
'auth' => true, 
'username' => $username, 
'password' => $password));

$mail = $smtp->send($to, $headers, $email_body);


if (PEAR::isError($mail)) {
	echo("<p>" . $mail->getMessage() . "</p>");
} 
else 
{
	echo("<p>Message successfully sent!</p>");
}
?>