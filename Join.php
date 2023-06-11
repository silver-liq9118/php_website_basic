<?php
include "db_conn.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    if ($password === $password_confirm) {
        $sql = "INSERT INTO users (email, password, username) VALUES ('$email', '$password', '$name')";
        $result = $conn->query($sql);

        // 가볍게 페이지를 꾸며주는 HTML
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
            <p>반갑습니다, <?= $name ?> 회원님!</p>
            <p>로그인하려면 <a class="login-button" href="Login_page.html">로그인</a> 버튼을 클릭해주세요.</p>
        </body>
        </html>
        <?php
    } else {
        echo "가입이 실패하였습니다.";
    }
}
?>
 