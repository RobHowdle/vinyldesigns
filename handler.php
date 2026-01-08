<?php

$from = 'Vinyl Designs Contact Form <info@vinyldesigns.co.uk>';
$sendTo = 'Mike Berry - Vinyl Designs <vinyldesignsbristol@yahoo.co.uk>';
$subject = 'New Contact Form Message';

$okMessage = '<h1>Contact form successfully submitted. Thank you, I will get back to you soon!</h1>';
$errorMessage = 'There was an error while submitting the form. Please try again later';

$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

function respond(string $status, string $message, bool $isAjax): void
{
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode([
            'type' => $status === 'success' ? 'success' : 'danger',
            'message' => $message,
        ]);
        exit;
    }

    header('Location: contact.php?status=' . urlencode($status));
    exit;
}

function verifyRecaptcha(string $secretKey, string $token, ?string $remoteIp = null): bool
{
    if ($secretKey === '' || $token === '') {
        return false;
    }

    $postFields = [
        'secret' => $secretKey,
        'response' => $token,
    ];

    if (!empty($remoteIp)) {
        $postFields['remoteip'] = $remoteIp;
    }

    $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $body = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($body === false || $httpCode !== 200) {
        return false;
    }

    $decoded = json_decode($body, true);
    return is_array($decoded) && !empty($decoded['success']);
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    respond('error', $errorMessage, $isAjax);
}

$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$number = trim((string)($_POST['number'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$captcha = trim((string)($_POST['g-recaptcha-response'] ?? ''));

if ($name === '' || $email === '' || $message === '') {
    respond('error', 'Please fill in your name, email, and message.', $isAjax);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond('error', 'Please enter a valid email address.', $isAjax);
}

if ($captcha === '') {
    respond('error', 'Please complete the captcha before submitting.', $isAjax);
}

$secretKey = (string)(getenv('RECAPTCHA_SECRET') ?: '6LdGqgAVAAAAAJ5LtALBZdYN5Su3AS67veDRe5Fi');
$remoteIp = $_SERVER['REMOTE_ADDR'] ?? null;

if (!verifyRecaptcha($secretKey, $captcha, $remoteIp)) {
    respond('error', 'Captcha verification failed. Please try again.', $isAjax);
}

$emailText = "Hi Mike!\nYou have a new message from your website\n=============================\n";
$emailText .= "Name: {$name}\n";
$emailText .= "Email: {$email}\n";
if ($number !== '') {
    $emailText .= "Number: {$number}\n";
}
$emailText .= "Message: {$message}\n";

$headers = [];
$headers[] = 'From: ' . $from;
$headers[] = 'Reply-To: ' . str_replace(["\r", "\n"], '', $email);

$sent = mail($sendTo, $subject, $emailText, implode("\r\n", $headers));

if (!$sent) {
    respond('error', $errorMessage, $isAjax);
}

respond('success', $okMessage, $isAjax);
