<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="login.css">
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

            <div class="back">
                <img class="backImg" src="images/backImg.jpg" alt="">
                <div class="text">
                    <span class="text-1">Complete miles of journey <br> with one step</span>
                    <span class="text-2">Let's get started</span>
                </div>
            </div>
        </div>

        <div class="forms">
            <div class="form-content">
                <div class="signup-form">
                    <div class="registration-form">
                        <div class="title">Register</div>
                        <form method="post" action="register.php">
                            <?php include('errors.php'); ?>
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="username" placeholder="Enter your username" value="<?php echo isset($username) ? $username : ''; ?>" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" name="email" placeholder="Enter your email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="password_1" placeholder="Enter your password" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="password_2" placeholder="Confirm your password" required>
                                </div>
                                <div class="button input-box">
                                    <input type="submit" class="btn" name="reg_user" value="Register">
                                </div>
                                <div class="text sign-up-text">Already a member? <label for="flip"><a href="login.php">Login</a></label></div>
                            </div>
                        </form>
                    </div>
</body>

</html>