// script.js
// Add your JavaScript for login and registration functionality here.

// Example: Simple client-side password match check for registration

document.addEventListener('DOMContentLoaded', function() {
    // Registration form password match validation
    var regForm = document.querySelector('form[action="registration.php"]');
    if (regForm) {
        regForm.addEventListener('submit', function(e) {
            var password = document.getElementById('password');
            var confirm = document.getElementById('confirm_password');
            if (password && confirm && password.value !== confirm.value) {
                alert('Passwords do not match!');
                e.preventDefault();
            }
        });
    }

    // Login form example (add your logic as needed)
    var loginForm = document.querySelector('form[action="login.php"]');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            // Example: Prevent empty username or password
            var username = document.getElementById('username');
            var password = document.getElementById('password');
            if (username && password && (!username.value || !password.value)) {
                alert('Please enter both username and password.');
                e.preventDefault();
            }
        });
    }
});
