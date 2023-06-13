<?php

include "db_conn.php";

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
}

try   
    {
    //로그인을 안한 사용자
    if (empty($email)) {
    return include "access_failed.html";
 } 
 
 }
    catch ( Exception $e ) { 
    // 오류 발생 시      
    return include "access_failed.html";
    }

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>게시판 글쓰기</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .notice {
            color: #333;
            text-align: center;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            resize: vertical;
            font-family: Arial, sans-serif; 
        }
        .button-group {
            display: flex;
            justify-content: space-between;
        }
        input[type="submit"],input[type="button"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px; 
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover,input[type="button"]:hover {
            background-color: #0056b3;
        }
        input[type=file]::file-selector-button {
        width: 90px;
        height: 30px;
        background: #fff;
        border: 1px solid rgb(77,77,77);
        border-radius: 10px;
        cursor: pointer;
        }

    </style>
</head>
<body>
    <h1> &#9997; 게시판 글쓰기 &#9997;</h1>
    <div class = "notice"name="notice"style="font-family: Arial, sans-serif;"> &#9994; 비속어를 지양하는 지성인이 됩시다 &#10024; </div>
    <p></p>
    <div class="container">
        <form action="write_post.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title"></label>
                <input type="text" id="title" name="title" required placeholder="제목을 입력해주세요." style="font-family: Arial, sans-serif;"> 
            </div>
            
            <div class="form-group">
                <label for="content"></label>
                <textarea id="content" name="content" rows="20" required placeholder="내용을 입력해주세요." style="font-family: Arial, sans-serif;"></textarea> 
            </div>
            <div class="button-group">
            <label for="file"></label>
                <!--<input type="file" accept=".doc,.docx"> 특정파일 허용 화이트리스트-->
                <input type="file" id="file" name="file">
                <input type="submit" value="작성하기">
                <input type="button" value="뒤로가기" onclick="goToBoardPage()">
            </div>
        </form>
    </div>
</body>
</html>
<script>
    function goToBoardPage() {
        window.location.href = "board.php";
    }
</script>