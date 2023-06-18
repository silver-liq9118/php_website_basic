<?php
include "db_conn.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['email']) && isset($_SESSION['username'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $author =$_SESSION['username'];
    $file = $_FILES['file'];

}

else {

    $title = "";
    $content ="";
    $author ="";
    $file="";

    return include "access_failed.html";

}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//title, author, created_at
$sql_post = "INSERT INTO posts (title,content, author) VALUES ('$title','$content','$author')";
$result_post = $conn->query($sql_post);

if ($result_post) {
    // 게시글 추가에 성공한 경우
    $postId = $conn->insert_id; 
    // 다시 postId를 가져옴
    if ($postId) {
        
        // 파일을 추가하고 게시판 페이지로 돌아감
        $uploadedFileName = $_FILES['file']['name'];
        $uploadedFileExt = pathinfo($uploadedFileName, PATHINFO_EXTENSION);  // 파일 확장자 추출
        $uniqueFileName = uniqid() . '.' . $uploadedFileExt;  // 고유한 파일 이름 생성
        $uploadDirectory = 'C:\xampp\htdocs\somefile\PHPweb\file\\'; //인코딩 변경불가로 인해 하드코딩 
        $uploadedFilePath = 'http://localhost/somefile/PHPweb/file/' . $uniqueFileName; // //인코딩 변경불가로 인해 하드코딩 
        $fileDestination = $uploadDirectory . $uniqueFileName;
        move_uploaded_file($_FILES['file']['tmp_name'], $fileDestination);
            
        $sql_file = "INSERT INTO files (filename, filename_user, filepath, post_id) VALUES ('$uniqueFileName', '$uploadedFileName', '$uploadedFilePath', $postId)";
        $result_file = $conn->query($sql_file);
    }

    if ($result_file) {
    
    include "board.php";
    
    } else { include "write_failed.html";}

    }


    else { include "write_failed.html";}
    
    
} else {

    // 게시글 추가에 실패한 경우
    // 에러메세지 출력시 $error_message = mysqli_error($conn);

    include "write_failed.html";
    
}


?>


