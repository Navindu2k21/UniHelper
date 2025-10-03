<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'connector.php';

// Function to log debug messages
function log_debug($message) {
    $log_file = 'registration_debug.log';
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($log_file, "$timestamp $message\n", FILE_APPEND);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($con, trim($_POST['username']));
    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    log_debug("Start registration process");
    log_debug("Received: $username, $email");

    if ($password !== $confirm_password) {
        log_debug("Error: Passwords do not match");
        header('Location: registration.php?error=Password+do+not+match');
        exit();
    }

    // Hash the password (WARNING: md5 is not secure, use only for legacy PHP)
    $hashed_password = md5($password);
    log_debug("Password hashed with md5");

    // Check if username or email already exists
    $check_sql = "SELECT id FROM users WHERE username = '$username' OR email = '$email'";
    $check_result = mysqli_query($con, $check_sql);
    if (!$check_result) {
        log_debug("Error in check query: " . mysqli_error($con));
        header('Location: registration.php?error=Database+error');
        exit();
    }
    $num_rows = mysqli_num_rows($check_result);
    log_debug("User check query executed. Rows found: $num_rows");
    if ($num_rows > 0) {
        log_debug("Error: Username or Email already exists");
        header('Location: registration.php?error=Username+or+Email+already+exists');
        exit();
    }
    log_debug("User check passed");

    // Handle avatar upload
    $avatar_path = '';
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $avatar_path = 'uploads/avatar_' . uniqid() . '.' . $ext;
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_path)) {
            log_debug("Avatar upload failed");
            $avatar_path = '';
        }
    }

    // Insert new user
    $insert_sql = "INSERT INTO users (username, email, password, avatar) VALUES ('$username', '$email', '$hashed_password', " . ($avatar_path ? "'$avatar_path'" : "NULL") . ")";
    $insert_result = mysqli_query($con, $insert_sql);
    if ($insert_result) {
        log_debug("Registration successful");
        header('Location: login.php?success=Registration+successful+please+login');
        exit();
    } else {
        log_debug("Error in insert query: " . mysqli_error($con));
        header('Location: registration.php?error=Registration+failed');
        exit();
    }
}
