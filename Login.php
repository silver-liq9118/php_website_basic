<?php 
include "db_conn.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT email, password FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    //echo "ID: " . $email . "<br>";
    //echo "Password: " . $password . "<br>";

    if (mysqli_num_rows($result)){

        if(!$_SESSION['email']){
        session_start();
        $_SESSION['email'] = $email;}

        else {
            echo("이미 로그인 되어 있습니다.");
        }

        echo("로그인성공");
    }
    else {
        echo("로그인실패");
    }

   }

?>