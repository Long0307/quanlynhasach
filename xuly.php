<?php
    session_start();
    require_once "config.php";

    if(isset($_POST['login'])){

        if(empty($_POST['user'])){
            $error["err_user"] = "<p style='color:red;'>Không được để trống username</p>";
        }else{
            $username = $_POST["user"];
        }

        if(empty($_POST['pass'])){
            $error["err_pass"] = "<p style='color:red;'>Không được để trống password</p>";
        }else{
            $password = $_POST["pass"];
        }

        if(!empty($username) && !empty($password) && empty($error)){
            echo $sql = "SELECT * FROM infomember WHERE username = '".mysqli_real_escape_string($conn,$username)."' AND password = '".md5($password)."'";
            $run = mysqli_query($conn,$sql);
                $info = array();
            if(mysqli_num_rows($run) > 0){
                $row = mysqli_fetch_array($run);
                $info[] = $row["username"];
                $info[] = $row["image"];
                $_SESSION["infomember"] = $info;
                header("Location:index.php");
            }else{
                echo "Đăng nhập không thành công";
            }
        }

    }

   
?>
   