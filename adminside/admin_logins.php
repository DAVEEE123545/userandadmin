

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #83c0e9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    display: flex;
    width: 70%;
    max-width: 1200px;
    background-color: #c4e2ee;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
}

.left-section {
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f4f4f4;
}

.illustration {
    max-width: 80%;
}

.right-section {
    width: 50%;
    padding: 40px;
}

.right-section h2 {
    font-size: 2.5em;
    margin-bottom: 30px;
    color: #333;
}

.login-form {
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 15px;
}

.input-group input {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.options a {
    color: #007BFF;
    text-decoration: none;
}

.login-btn {
    width: 100%;
    padding: 12px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.login-btn:hover {
    background-color: #0056b3;
}

.signup {
    text-align: center;
    margin-top: 20px;
}

.signup a {
    color: #007BFF;
    text-decoration: none;
}

.app-links {
    display: flex;
    justify-content: center;
    gap: 5px;
    margin-top: 5%;
}
    </style>
    <div class="container">
        <div class="left-section">
            <img src="Person-Computer.png" alt="Illustration" class="illustration">
        </div>
        <div class="right-section">
            <h2>Hello,<br>Welcome Back</h2>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <input type="text" id="username_or_email" name="username_or_email" placeholder="Username or Email" required>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="options">
                    <label><input type="checkbox"> Remember Me</label>
                    <a href="createpass.html">Forgot Password?</a>
                </div>
                <button type="submit" class="login-btn">Sign In</button>
            </form>
            <div class="signUp">
                 <p>Don't have an account? <a href="admin_registers.php">Register here</a></p>
            </div>
            <div class="app-links">
                <a href="#"><img src="applestore.png" alt="App Store"></a>
                <a href="#"><img src="applestore.png" alt="Google Play"></a>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>