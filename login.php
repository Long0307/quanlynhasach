<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    require_once "xuly.php";
?>
    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/form-img.jpg" alt="">
                    <div class="signup-img-content">
                        <h2>LOGIN</h2>
                        <p>while seats are available !</p>
                    </div>
                </div>



                <div class="signup-form">
                   
                    <form action="" method="post" class="register-form" id="register-form" enctype="multipart/form-data">
                        <h1>Group 7 bookstore management project</h1>
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="company">User name:</label>
                                    <input type="text" name="user" id="username" />
                                    <?php if(isset($error["err_user"])) echo $error["err_user"]; ?>
                                </div>
                                <div class="form-input">
                                    <label for="password">Password:</label>
                                    <input type="password" name="pass" id="password" />
                                    <?php if(isset($error["err_pass"])) echo $error["err_pass"]; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="submit" id="submit" name="login">ĐĂNG NHẬP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>