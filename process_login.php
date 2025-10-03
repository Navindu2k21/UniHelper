<?php
// process_login.php
require_once 'connector.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($con, trim($_POST['username']));
    $password = $_POST['password'];
    $hashed_password = md5($password); // match registration hashing

    $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$hashed_password'";
    $result = mysqli_query($con, $sql);
    if ($result && mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    // Fetch full user details
    $user_sql = "SELECT * FROM users WHERE id = '" . $row['id'] . "'";
    $user_result = mysqli_query($con, $user_sql);
    $user = mysqli_fetch_assoc($user_result);
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['name'] = $user['username']; // Use username as name
    $_SESSION['email'] = $user['email'];
    $_SESSION['student_id'] = $user['id']; // Use id as student_id
    header('Location: index.php'); // Redirect to home or dashboard
    exit();
    } else {
        header('Location: login.php?error=Invalid+credentials');
        exit();
    }
}
