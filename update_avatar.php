<?php
// update_avatar.php: Handles avatar upload and updates user record
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
require_once 'connector.php';

if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $user_id = $_SESSION['user_id'];
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $filename = 'uploads/avatar_' . $user_id . '_' . time() . '.' . $ext;
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $filename)) {
        $sql = "UPDATE users SET avatar = '" . mysqli_real_escape_string($con, $filename) . "' WHERE id = '" . intval($user_id) . "'";
        mysqli_query($con, $sql);
        $_SESSION['avatar'] = $filename;
        header('Location: profile.php?success=Avatar+updated');
        exit();
    } else {
        header('Location: profile.php?error=Upload+failed');
        exit();
    }
} else {
    header('Location: profile.php?error=No+file+selected');
    exit();
}
