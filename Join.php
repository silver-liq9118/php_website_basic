<?php

try {
    include "db_conn.php";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $email = $_POST['email'];
            $username = $_POST['username'];

            if ($password === $password_confirm) {
                $sql = "INSERT INTO users (email, password, username) VALUES ('$email', '$password', '$username')";
                $result = $conn->query($sql);

                if($result) {
                    $_SESSION['signup_values'] = [
                        'password' => $password,
                        'password_confirm' => $password_confirm,
                        'email' => $email,
                        'username' => $username
                    ];

                ?>

                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <title>회원 가입 완료</title>
                    <style>
                        body {
                            background-color: #f3f3f3;
                            text-align: center;
                            padding-top: 100px;
                            font-family: Arial, sans-serif;
                        }
                        h1 {
                            color: #333;
                            font-size: 28px;
                        }
                        p {
                            color: #666;
                            font-size: 16px;
                        }
                        .login-button {
                            display: inline-block;
                            background-color: #007bff;
                            color: #fff;
                            padding: 10px 20px;
                            border-radius: 4px;
                            text-decoration: none;
                            transition: background-color 0.3s;
                        }
                        .login-button:hover {
                            background-color: #0056b3;
                        }
                    </style>
                </head>
                <body>
                    <h1>회원 가입 완료!</h1>
                    <p>반갑습니다, <?= $username ?> 회원님!</p>
                    <p>&#128273; 로그인을 하시려면 <a class="login-button" href="Login_page.html">로그인</a> 버튼을 클릭해주세요.</p>
                </body>
                </html>
            <?php } unset($_SESSION['signup_values']);
            header("Cache-Control: no-cache, no-store, must-revalidate");
            header("Pragma: no-cache");
            header("Expires: 0"); 
                    
            
        }}}  
        catch (mysqli_sql_exception $e) {
        ?>
                <!DOCTYPE html>
                <html>
                <meta charset="UTF-8">
                    <title>회원 가입 완료</title>
                    <style>
                        body {
                            background-color: #f3f3f3;
                            text-align: center;
                            padding-top: 100px;
                            font-family: Arial, sans-serif;
                        }
                        h1 {
                            color: #333;
                            font-size: 28px;
                        }
                        p {
                            color: #666;
                            font-size: 16px;
                        }
                        .login-button {
                            display: inline-block;
                            background-color: #007bff;
                            color: #fff;
                            padding: 10px 20px;
                            border-radius: 4px;
                            text-decoration: none;
                            transition: background-color 0.3s;
                        }
                        .login-button:hover {
                            background-color: #0056b3;
                        }
                    </style> 
                <h1> 회원 가입에 실패하였습니다.&#128546; <br> 다시 시도해 주세요.</h1>
                <p>&#127969;홈페이지로 돌아가시려면 <a class="login-button" href="Login_page.html"> 홈페이지 바로가기 </a> 버튼을 클릭해주세요.</p>
                <p>&#128221;회원가입 <a class="login-button" href="Join_page.html"> 회원가입</a> 버튼을 클릭해주세요.</p>
                </html>
                <?php }?> 

 