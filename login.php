<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="images/frontImg.jpg" alt="">
                <div class="text">
                    <span class="text-1">Student Management<br> System</span>
                    <span class="text-2">get connected</span>
                </div>
            </div>
           
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>
                    <form method="post" action="login.php">
                        <?php include('errors.php'); ?>
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="username" placeholder="Enter your username" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="text"><a href="#">Forgot password?</a></div>
                            <div class="button input-box">
                                <input type="submit" class="btn" name="login_user" value="Login">
                            </div>
                            <div class="text sign-up-text">Don't have an account? <label for="flip"><a href="register.php">Sign up</a></label></div>
                        </div>
                    </form>
                </div>

                
            </div>
        </div>
    </div>
</body>

</html>
