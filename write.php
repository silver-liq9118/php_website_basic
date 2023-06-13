
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>게시판 글 출력</title>
</head>
<body>
<h1>게시판 글 출력</h1>
<?php
$title = $_POST['title'];
$content = $_POST['content'];

// POST 데이터 확인 및 출력
if ($_SERVER["REQUEST_METHOD"] == "POST") {
/*파일을 읽어와서 title, content 변수에 넣는 코드 작성*/
echo "<h2>제목: " . $title . "</h2>";
echo "<p>내용: " . $content . "</p>";
}
?>
</body>
</html>