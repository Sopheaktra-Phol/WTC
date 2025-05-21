<?php
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

$errors = [];

if (empty($name)) {
    $errors['name_error'] = 'Name is required.';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email_error'] = 'Valid email is required.';
}

if (empty($password)) {
    $errors['password_error'] = 'Password is required.';
} elseif ($password !== $confirm_password) {
    $errors['confirm_error'] = 'Passwords do not match.';
}

if ($errors) {
    $params = array_merge($errors, ['name' => $name, 'email' => $email]);
    header("Location: index.html?" . http_build_query($params));
    exit;
}

// Success
echo "<h2>Form Submitted Successfully</h2>";
echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
?>
