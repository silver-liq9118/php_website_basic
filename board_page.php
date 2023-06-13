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
    </style>
</head>

<body>
    <h1>&#9997;게시판&#128172;</h1>
    <div class="button-container">
        <input type="submit" value="게시글 작성하기&#128221;" name="post" onclick="window.location.href='write_post_page.html'">
        <div class="input-container">
            <input type="text" id="find_title" name="find_title" required placeholder="찾고싶은 게시물 제목">
            <button onclick="find()">찾기&#128269;</button>
        </div>
    </div>
    <br>
    <table>
        <tr>
            <th>No.</th>
            <th>제목</th>
            <th>작성자</th>
            <th>작성일</th>
        </tr>
        <?php

        // 게시물 데이터를 동적으로 표에 추가합니다.
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
            }?>
    </table>
    <script>
    function goToBoard(postId) {
        // 게시물 상세 페이지로 이동합니다.
        window.location.href = 'get_board_content.php?id=' + postId;
    }
    </script>
</body>
</html>
