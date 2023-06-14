<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>게시글 보기</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        .title{
            font-family: Arial, sans-serif;
            color: #666666;
            font-size: 19px;
            
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .content {
            margin-bottom: 20px;
        }
        .content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .button-group {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .button-group button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }
        .button-group button:hover {
            background-color: #0056b3;
        }
        .container hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
        .info {
            font-family: Arial, sans-serif;
            font-size: 15px;
        }

        .download-link {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s;
        }
        .download-link:hover {
            background-color: #0056b3;
            }

    </style>
</head>
<body>
    <h1>📄 게시글 보기 📄</h1>          
    <div class="container"> 
        <div class="title">
        <p><?php echo nl2br($title); ?><p>
        </div>
        <div class="info">
            <p><i class="fas fa-user" style="color: #66666;"></i>&nbsp;&nbsp;<?php echo nl2br($author); ?><br>작성일 : <?php echo nl2br($created_at); ?> 수정일: <?php echo nl2br($updated_at); ?> </p></div>
        <hr>
        <div class="container"> 
        <div class="content">
            <p><?php echo nl2br($content); ?></p> </div>
        </div>
       
        <!--파일 가져오기-->
        <?php

        if (mysqli_num_rows($file_result)>0) {
             // 파일 확장자에 따라 다운로드 링크 제공
            // $allowedExtensions = array('pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt'); // 다운로드 가능한 파일 확장자 목록
            //$fileExtension = pathinfo($filename_user, PATHINFO_EXTENSION); // 파일 확장자 추출
            //$fileName = pathinfo($filename_user, PATHINFO_FILENAME); // 확장자를 제외한 파일 이름 추출
            //경로 인코딩이 도저히 안돼서절대경로로 변경      
            //echo "$filepath";
            echo '<div class="button-group"><a href="' . $filepath . '" download="' . $filename_user . '" class="download-link">';
            echo '파일 다운로드</div></a>';
        }

        ?>
        
        <div class="button-group">
            <button onclick="goToBoardPage()">뒤로 가기</button>
        </div>
    </div>

    <script>
        function goToBoardPage() {
            window.location.href = "board.php";
        }
    </script>
</body>
</html>