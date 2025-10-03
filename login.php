<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniHelper - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>UniHelper - Login</h2>
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
        <form action="process_login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <a href="registration.php" class="register-link">Don't have an account? Register here</a>
    </div>
</body>
    <script src="script.js"></script>
</html>