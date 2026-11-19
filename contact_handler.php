<?php
/**
 * Contact Form Processor
 * Kenneth James B. Tolentino - Digital Portfolio
 * Supports both asynchronous AJAX fetch() submissions and traditional POST fallback.
 */

session_start();

// Helper to detect AJAX / Fetch requests
$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
    || (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)
    || (isset($_POST['is_ajax']) && $_POST['is_ajax'] === '1');

// Respond helper
function sendResponse($success, $message, $errors = [], $isAjax = false) {
    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($success ? 200 : 422);
        echo json_encode([
            'success' => $success,
            'message' => $message,
            'errors' => $errors
        ]);
        exit;
    } else {
        // Fallback for non-JS standard form post
        $_SESSION['contact_status'] = [
            'success' => $success,
            'message' => $message,
            'errors' => $errors
        ];
        header('Location: index.php#contact');
        exit;
    }
}

// Only handle POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse(false, 'Invalid request method. Only POST submissions are accepted.', ['method' => 'Method not allowed'], $isAjax);
}

// 1. Anti-Spam Honeypot verification (field 'website_hp' must be empty)
if (!empty($_POST['website_hp'])) {
    // Bot detected; silently accept to confuse spam bot
    sendResponse(true, 'Your message has been received! Thank you for reaching out.', [], $isAjax);
}

// 2. Extract and sanitize inputs
$name    = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : '';
$email   = isset($_POST['email']) ? trim($_POST['email']) : '';
$subject = isset($_POST['subject']) ? trim(strip_tags($_POST['subject'])) : '';
$message = isset($_POST['message']) ? trim(strip_tags($_POST['message'])) : '';

$errors = [];

// 3. Validation Rules
// Name validation
if (empty($name)) {
    $errors['name'] = 'Full name is required.';
} elseif (mb_strlen($name) < 2) {
    $errors['name'] = 'Name must be at least 2 characters long.';
} elseif (mb_strlen($name) > 100) {
    $errors['name'] = 'Name cannot exceed 100 characters.';
}

// Email validation
if (empty($email)) {
    $errors['email'] = 'Email address is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid, deliverable email address.';
} elseif (mb_strlen($email) > 120) {
    $errors['email'] = 'Email address is too long.';
}

// Subject validation
if (empty($subject)) {
    $errors['subject'] = 'Please select or provide an inquiry subject.';
} elseif (mb_strlen($subject) > 150) {
    $errors['subject'] = 'Subject cannot exceed 150 characters.';
}

// Message validation
if (empty($message)) {
    $errors['message'] = 'Message content is required.';
} elseif (mb_strlen($message) < 15) {
    $errors['message'] = 'Please provide more details (minimum 15 characters).';
} elseif (mb_strlen($message) > 3000) {
    $errors['message'] = 'Message is too lengthy (maximum 3000 characters).';
}

// If validation fails
if (!empty($errors)) {
    sendResponse(false, 'Please correct the highlighted errors in the form.', $errors, $isAjax);
}

// 4. Sanitize for safe storage / display
$cleanName    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$cleanEmail   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$cleanSubject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$cleanMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

// 5. Store message safely in a local JSON log (optional audit storage)
$storageDir = __DIR__ . '/data';
if (!is_dir($storageDir)) {
    @mkdir($storageDir, 0755, true);
}

$logFile = $storageDir . '/contact_submissions.json';
$submissionEntry = [
    'timestamp'  => date('Y-m-d H:i:s'),
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN',
    'name'       => $cleanName,
    'email'      => $cleanEmail,
    'subject'    => $cleanSubject,
    'message'    => $cleanMessage
];

$existingData = [];
if (file_exists($logFile)) {
    $content = @file_get_contents($logFile);
    if ($content) {
        $decoded = @json_decode($content, true);
        if (is_array($decoded)) {
            $existingData = $decoded;
        }
    }
}

// Append latest message
array_unshift($existingData, $submissionEntry);
// Limit stored entries to 100 for safety
if (count($existingData) > 100) {
    $existingData = array_slice($existingData, 0, 100);
}
@file_put_contents($logFile, json_encode($existingData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

// 6. Return success
$successMsg = "Thank you, {$cleanName}! Your message regarding '{$cleanSubject}' was received successfully. Kenneth James Tolentino will respond promptly.";
sendResponse(true, $successMsg, [], $isAjax);
