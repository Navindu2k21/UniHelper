<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniHelper - Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="registration-container">
    <h2>UniHelper - Registration</h2>
    <img src="images/logo.png" alt="logo" width="100px" height="100px" class="logo-center">
        <?php if (isset($_GET['error'])): ?>
            <div style="color: red; text-align: center; margin-bottom: 1rem;">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['success'])): ?>
            <div style="color: green; text-align: center; margin-bottom: 1rem;">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php endif; ?>
        <form action="process_registration.php" method="post" enctype="multipart/form-data">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <label for="avatar">Profile Photo (optional):</label>
            <input type="file" id="avatar" name="avatar" accept="image/*">
            <input type="submit" value="Register">
        </form>
        <a href="login.php" class="login-link">Already have an account? Login here</a>
    </div>
</body>
    <script src="script.js"></script>
</html>