<?php

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if(isset($_SESSION['email']) && isset($_SESSION['username'])){
        $email = $_SESSION['email'];
        $username =$_SESSION['username'];
        // 세션에서 유저 이름 가져오기
        }
        else {
        $email = "";
        $username ="";
        return include "access_failed.html";
        }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f5f5;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .button-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .button-container input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .input-container {
            display: flex;
            align-items: center;
        }

        .input-container input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .input-container button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 10px;
        }

        .input-container button:hover {
            background-color: #45a049;
        }

        .post-link {
        color: #000;
        text-decoration: none;
        transition: color 0.3s ease;
        }
        .post-link:hover {
        color: #ff0000;
        }
        .not-link {
        text-align: center;
        
        }
    </style>
</head>

<body>
    <h1>&#9997;게시판&#128172;</h1>
    <div class="button-container">
        <input type="submit" value="게시글 작성하기&#128221;" name="post" onclick="window.location.href='write_post_page.php'">
        <div class="input-container">
        <form action="get_board_search.php" name="find_title"method="post" autocomplete="off">
        <input type="text" id="find_title" name="find_title" required placeholder="찾고싶은 게시물 제목">
        <input type="submit" value="찾기&#128269;">
        </form>
        </div>
    </div>
    <br>
    <table>
        <tr>
            <th></th>
            <th>제목</th>
            <th>작성자</th>
            <th>작성일</th>
        </tr>
        <?php
        // 게시물 데이터를 동적으로 표에 추가합니다.

        if ($rows === 0) {
            echo "<h3 class='not-link'>&#128269; 해당 게시글을 찾을 수 없습니다. &#128531;</h3>";
            echo "<h4 class='not-link'>3초후 게시판으로 이동됩니다.</h3>";
        
            echo "<div id='countdown'></div>";
            echo "<script>";
            echo "var countdownElement = document.getElementById('countdown');";
            echo "var countdownTime = 3000;"; 
        
            echo "function updateCountdown() {";
            echo "  countdownElement.textContent = (countdownTime / 1000);";
            echo "  countdownTime -= 1000;";
            echo "  if (countdownTime >= 0) {";
            echo "    setTimeout(updateCountdown, 1000);"; // 1초(1000ms)마다 업데이트
            echo "  } else {";
            echo "    window.location.href = 'board.php';";
            echo "  }";
            echo "}";
            echo "setTimeout(updateCountdown, 1000);"; // 카운트다운 시작
            echo "</script>";

            echo "<br>";
        
            exit;
        }
        

        else {
        foreach ($rows as $post) {
            $postId = $post['id'];
            echo "<tr onclick='goToBoard({$postId})'>";
            echo "<td><a href='get_board_content.php?id={$post['id']}' class='post-link'>{$post['id']}</a></td>";
            echo "<td>{$post['title']}</td>";
            echo "<td>{$post['author']}</td>";
            echo "<td>{$post['created_at']}</td>";
            echo "</tr>";
            echo "</a>";
        }
               // 게시물의 콘텐츠 데이터를 가져오는 함수
               function getContent($postId) {
                
                include "get_board_content.php";

                return "게시물 {$postId}의 콘텐츠";
            }}
            ?>
    </table>
    <script>
    function goToBoard(postId) {
        // 게시물 상세 페이지로 이동합니다.
        window.location.href = 'get_board_content.php?id=' + postId;
    }

    function BackToBoard() {
        
        window.location.href = 'board_page.php';
    }
    </script>


    </script>
    
</body>
</html>
