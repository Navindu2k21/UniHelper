<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
require_once 'connector.php';
// Fetch user info from DB to get latest avatar
$user_id = $_SESSION['user_id'];
$user_sql = "SELECT * FROM users WHERE id = '" . intval($user_id) . "'";
$user_result = mysqli_query($con, $user_sql);
$user = mysqli_fetch_assoc($user_result);
$name = $user['username'];
$email = $user['email'];
$student_id = $user['id'];
$avatar = $user['avatar'] ? $user['avatar'] : 'https://randomuser.me/api/portraits/men/32.jpg';
$_SESSION['avatar'] = $avatar;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | UniHelper</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="admin-btn.css">
    <style>
    body {
        background: linear-gradient(120deg, #6a11cb 0%, #2575fc 100%);
        min-height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', Arial, sans-serif;
        color: #fff;
    }
    .profile-section {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .profile-card {
        background: rgba(255,255,255,0.10);
        border-radius: 1.5rem;
        box-shadow: 0 2px 12px rgba(31,38,135,0.10);
        padding: 2.5rem 2rem 2rem 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 340px;
        max-width: 420px;
        transition: box-shadow 0.2s;
        position: relative;
    }
    .profile-avatar {
        margin-bottom: 1.2rem;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }
    .avatar-img-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
    .profile-avatar img {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        object-fit: cover;
        border: none;
        background: #e3e9f7;
        box-shadow: 0 1px 4px rgba(37,117,252,0.10);
        display: block;
        margin: 0 auto;
    }
    .edit-avatar-btn {
        position: absolute;
        bottom: 0;
        right: 0;
        background: #2575fc;
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.1rem;
        box-shadow: 0 2px 8px rgba(37,117,252,0.13);
        transition: background 0.2s;
    }
    .edit-avatar-btn:hover {
        background: #6a11cb;
    }
    .profile-info {
        width: 100%;
        text-align: center;
    }
    .profile-info h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #fff;
    }
    .profile-info p {
        color: #e3e9f7;
        margin-bottom: 0.3rem;
        font-size: 1.05rem;
    }
    .profile-info input {
        background: rgba(255,255,255,0.15);
        border: none;
        border-radius: 0.7rem;
        color: #fff;
        font-size: 1.05rem;
        padding: 0.4rem 1rem;
        margin-bottom: 0.5rem;
        width: 90%;
        text-align: center;
        outline: none;
        transition: background 0.2s;
    }
    .profile-info input:focus {
        background: rgba(255,255,255,0.25);
    }
    .profile-actions {
        margin-top: 1.2rem;
        display: flex;
        gap: 1rem;
        justify-content: center;
    }
    .avatar-upload-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 0.7rem;
    }
    .avatar-upload-form input[type=file] {
        color: #fff;
        margin-bottom: 0.5rem;
    }
    /* Removed custom upload button styles to match Add Subjects page */
    @media (max-width: 600px) {
        .profile-card {
            min-width: 90vw;
            padding: 1.2rem 0.5rem;
        }
    }
    </style>
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="profile-section">
    <div class="profile-card" id="profileCard">
        <div class="avatar-img-wrapper" style="display: flex; justify-content: center; align-items: center; width: 100%;">
            <img id="avatarImg" src="<?php echo htmlspecialchars($avatar); ?>" alt="Profile Avatar">
        </div>
        <form class="avatar-upload-form" action="update_avatar.php" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; align-items: center; margin-top: 0.7rem;">
            <input type="file" name="avatar" accept="image/*" required style="margin-bottom: 0.5rem;">
            <button type="submit"><i class="fa fa-upload"></i> Upload Photo</button>
        </form>
        <div class="profile-info" id="profileInfo">
            <h2 id="profileName"><?php echo htmlspecialchars($name); ?></h2>
            <p id="profileId">Student ID: <span><?php echo htmlspecialchars($student_id); ?></span></p>
            <p id="profileEmail">Email: <span><?php echo htmlspecialchars($email); ?></span></p>
        </div>
        <form id="editForm" style="display:none;" class="profile-info" method="post" action="update_profile.php">
            <input type="text" id="editName" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            <input type="text" id="editId" name="student_id" value="<?php echo htmlspecialchars($student_id); ?>" required>
            <input type="email" id="editEmail" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </form>
        <div class="profile-actions">
            <button type="button" id="editBtn" onclick="toggleEdit(event)"><i class="fa fa-pen"></i> Edit Profile</button>
            <button type="button" id="saveBtn" style="display:none;" onclick="saveProfile(event)"><i class="fa fa-save"></i> Save</button>
            <button type="button" id="cancelBtn" style="display:none;" onclick="cancelEdit(event)"><i class="fa fa-times"></i> Cancel</button>
        </div>
    </div>
</div>
<script>
function toggleEdit(e) {
    e.preventDefault();
    document.getElementById('profileInfo').style.display = 'none';
    document.getElementById('editForm').style.display = 'block';
    document.getElementById('editBtn').style.display = 'none';
    document.getElementById('saveBtn').style.display = 'inline-block';
    document.getElementById('cancelBtn').style.display = 'inline-block';
}
function cancelEdit(e) {
    e.preventDefault();
    document.getElementById('profileInfo').style.display = 'block';
    document.getElementById('editForm').style.display = 'none';
    document.getElementById('editBtn').style.display = 'inline-block';
    document.getElementById('saveBtn').style.display = 'none';
    document.getElementById('cancelBtn').style.display = 'none';
}
function saveProfile(e) {
    e.preventDefault();
    document.getElementById('editForm').submit();
}
</script>
</body>
</html>
