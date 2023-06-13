<?php
include "db_conn.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['email']) && isset($_SESSION['username'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $author =$_SESSION['username'];

}

else {

    $title = "";
    $content ="";
    $author ="";


    return include "access_failed.html";

}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//title, author, created_at
$sql = "INSERT INTO posts (title,content, author) VALUES ('$title','$content','$author')";
$result = $conn->query($sql);

if ($result) {
    // 게시글 추가에 성공한 경우
    include "board.php";
    
} else {

    // 게시글 추가에 실패한 경우
    // 에러메세지 출력시 $error_message = mysqli_error($conn);

    include "write_failed.html";
    
}
}

else {

    // 게시글 추가에 실패한 경우
    // 에러메세지 출력시 $error_message = mysqli_error($conn);

    include "write_failed.html"; }
?>


