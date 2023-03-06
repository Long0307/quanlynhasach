<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "nhetis4q_quanlynhasach";
    
    $conn = mysqli_connect($host,$user,$pass,$dbname) or die("Lỗi");;

    if($conn){
        mysqli_set_charset($conn,'utf8');
    }

    // $sql = "CREATE TABLE user(
    //     id int(11) auto_increment primary key,
    //     firstname varchar(255),
    //     lastname varchar(255),
    //     username varchar(255),
    //     pass varchar(255),
    //     email varchar(255),
    //     gender varchar(255),
    //     birthday date,
    //     addresss varchar(255),
    //     avatar varchar(255)
    // )";
    // $run = mysqli_query($conn,$sql);

    // if($run){
    //     echo "Tạo database thành công";
    // }
?>