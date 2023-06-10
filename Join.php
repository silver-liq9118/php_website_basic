<?php 
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    

    
    if($password === $password_confirm){

      
      $sql = "INSERT INTO users (email, password, username) VALUES ('$email', '$password', '$name')";
      $result = $conn->query($sql);

      echo "회원가입 되었습니다! <br>";
      echo "반갑습니다!".$email." 회원님";
   
    }
    
    else{
      echo "패스워드가 일치하지 않습니다.";
    }

   

   }


   


?>