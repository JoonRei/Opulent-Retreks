<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT mypassword FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['mypassword'];


        if (password_verify($password, $hashed_password)) {

            $_SESSION['loggedIn'] = true;

            header("Location: home.php");
            exit();
        } else {

            header("Location: login.php?error=InvalidCredentials");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Opulent Retreks Login|Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">
                Login
            </div>
            <div class="title signup">
                Register
            </div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Register</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form action="login.php" method="POST" class="login">
                    <div class="field">
                        <input type="text" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="pass-link">
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login" name="login">
                    </div>
                    <div class="signup-link">
                        Not a member? <a href="#">Register</a>
                    </div>
                </form>
                <form action="register.php" method="POST" class="signup">

                    <div class="field">
                        <input type="text" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="field">
                        <input type="password" id="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="field">
                        <input type="password" id="confirm_password" placeholder="Confirm Password" name="confirm_password" required>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Submit" name="submit" onclick="return validatePassword()">
                    </div>
                    <div style="text-align: center; margin-top: 10px;">
                        <span id="passwordError" style="font-size: 15px; color: red; display: none;">Password must
                            contain at least 8 characters with 1 lowercase and 1 uppercase letter.</span>
                        <span id="confirmPasswordError" style="font-size: 15px; color: red; display: none;">Password does
                            not match.</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = (() => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (() => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (() => {
            signupBtn.click();
            return false;
        });

    </script>
    
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var passwordError = document.getElementById("passwordError");
            var confirmPasswordError = document.getElementById("confirmPasswordError");

            if (password !== confirmPassword) {
                confirmPasswordError.style.display = "block";
                return false;
            } else {
                confirmPasswordError.style.display = "none";
            }

            if (password.length < 8 || !/[a-z]/.test(password) || !/[A-Z]/.test(password)) {
                passwordError.style.display = "block";
                return false;
            } else {
                passwordError.style.display = "none";
            }

            return true;
        }
    </script>
</body>

</html>