<?php
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $username = $_POST['username'];

  // 중복 확인
  $sql = "SELECT username FROM users WHERE username='$username'";
  $result = $conn->query($sql);

if(mysqli_num_rows($result)){
  
echo "중복된 Name입니다.<br>";     
    
}
else {
    if($username === ''){
        echo "Name을 입력해주세요.";
    }
    else {
        echo "사용가능한 Name입니다.";
    }
   
}
 
}


?>