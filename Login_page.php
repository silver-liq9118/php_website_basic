
<?php 

if (session_status() === PHP_SESSION_NONE) {
 session_start();
 }



if (isset($_SESSION['username'])){
?>
<!DOCTYPE html>
  <html>
  <head>
      <meta charset="UTF-8">
      <title>Hello PHP</title>
      <style>
          body {
              font-family: Arial, sans-serif;
              text-align: center;
              background-color: #f5f5f5;
          }
  
          h1 {
              color: #333;
          }
  
          .message {
              margin-bottom: 20px;
              font-size: 18px;
              color: #777;
          }
  
          .button-container {
              margin-top: 20px;
          }
  
          .button-container button {
              padding: 10px 20px;
              font-size: 16px;
              background-color: #4caf50;
              color: #fff;
              border: none;
              cursor: pointer;
              transition: background-color 0.3s ease;
          }
  
          .button-container button:hover {
              background-color: #45a049;
          }
      </style>
  </head>

<?php }
else { ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>로그인</title>
  <style>
    /* 스타일링을 위한 CSS 코드 */
    body {
      font-family: Arial, sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 400px;
      height: 400px;
      border: 1px solid #ccc;
      background-color: #f4f4f4;
    }
    h2 {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 20px;
      text-align: center;
    }
    .input-row {
      display: flex;
      align-items: center;
    }
    .input-label {
      font-size: 18px;
      margin-right: 10px;
    }
    input[type="text"],
    input[type="password"] {
      flex: 1;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      font-size: 18px;
    }
    .register-link {
      text-align: center;
      margin-top: 10px;
      font-size: 16px;
      color: #888;
    }
    .register-link a {
      text-decoration: none;
      color: #888;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>&#127752;Hello PHP World&#127752;</h2>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();}

    else{
      if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
          $email = $_POST['email'];
          $password = $_POST['password'];  
      }}
  


    ?>
    <form action="Login.php" method="post">
      <div class="form-group">
        <div class="input-row">
          <label for="email" class="input-label">ID:</label>
          <input type="text" id="email" name="email" required>
        </div>
      </div>
      <div class="form-group">
        <div class="input-row">
          <label for="password" class="input-label">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
      </div>
      <input type="submit" value="로그인">
      <div class="register-link">
        <a href="Join_page.html">회원가입</a> | <a href="forgot.html">아이디/비밀번호 찾기</a>
      </div>
    </form>
  </div>
</body>
</html>
<?php }?>


