
<?php 
if (session_status() === PHP_SESSION_NONE) {
 session_start();
 }

$username= $_SESSION['username'] ;

if ($username){
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
  <body>

  <h1><?= $username; ?> 님! &#128075;</h1>
                <h1>이미 로그인되었습니다. &#128064;</h1>
                
                <div class="message">
                    새로운 계정으로 로그인하시려면 로그아웃 후 진행해주세요.</div>
                <div class="button-container">    
                    <button onclick="goToBoardList()">Go to Board this user!</button>
                    <button onclick="logout()">Logout</button>
                </div>
                <script>
        function goToBoardList() {           
            window.location.href = "board.php";   
        }
        function logout() {
            window.location.href = "Logout.php";
        }
    </script>
  

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


