<?php
// require ReCaptcha class
require('recaptcha/src/autoload.php');
$from_email = '<example@domain.com>';
$send_to_email = '<example@domain.com>';
$subject = 'New message from contact form';
$form_fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message'); 
$mail_send_suceess = 'Contact form successfully submitted. Thank you, I will get back to you soon!';
$mail_send_failed = 'There was an error while submitting the form. Please try again later';
$recaptcha_secret_key = 'Google Captcha Secret Key';
try {
    if (!empty($_POST)) {            
        if (!isset($_POST['g-recaptcha-response'])) {
            throw new \Exception('ReCaptcha is not set.');
        }
        $recaptcha = new \ReCaptcha\ReCaptcha($recaptcha_secret_key, new \ReCaptcha\RequestMethod\CurlPost());          
        $response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
        if (!$response->isSuccess()) {
            throw new \Exception('ReCaptcha was not validated.');
        }        
        $message_body = "You have new message from contact form\n=============================\n";
        foreach ($_POST as $key => $value) {
            if (isset($form_fields[$key])) {
                $message_body .= "$form_fields[$key]: $value\n";
            }
        }
        $headers = array('Content-Type: text/plain; charset="UTF-8";',
            'From: ' . $from_email,
            'Reply-To: ' . $from_email,
            'Return-Path: ' . $from_email,
        );
        mail($send_to_email, $subject, $message_body, implode("\n", $headers));
        $responseArray = array('type' => 'success', 'message' => $mail_send_suceess);
    }
} catch (\Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $mail_send_failed);
}
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    header('Content-Type: application/json');
    echo $encoded;
} else {
    echo $responseArray['message'];
}