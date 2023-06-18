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
    <?php
    include "db_conn.php";
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT email, password, username FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result && mysqli_num_rows($result) > 0) {
            
            $row = $result->fetch_assoc();
            $username = $row['username'];
            $email = $row['email']; }}

    
            if (!isset($_SESSION['email'])) { 
    ?>
                <h1>반갑습니다, <?= $username; ?> 님! &#128075;</h1>
                <div class="message">
                    Login 되었습니다! PHP World에서 즐거운 시간되세요! 
                </div>
                <?php
                $_SESSION['username']  = $username ;
                $_SESSION['email'] =$email;?>
                <div class="button-container">
                    <button onclick="goToBoardList()">Go to Board</button>
                    <button onclick="logout()">Logout</button>
                </div>
    <?php
            } 
            else {     

                    $username= $_SESSION['username'] ;
                    $email= $_SESSION['email'];
                   
    ?>          
                <h1><?php echo $username; ?> 님! &#128075;</h1>
                <h1>이미 로그인되었습니다. &#128064;</h1>
                
                <div class="message">
                    새로운 계정으로 로그인하시려면 로그아웃 후 진행해주세요.</div>
                <div class="button-container">    
                    <button onclick="goToBoardList()">Go to Board this user!</button>
                    <button onclick="logout()">Logout</button>
                </div>
    <?php
            }
         
    
   

    ?>
    <script>
        function goToBoardList() {           
            window.location.href = "board.php";   
        }
        function logout() {
            window.location.href = "Logout.php";
        }
    </script>
</body>
</html>