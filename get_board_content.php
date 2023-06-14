<?php
include "db_conn.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    $postId = $_GET['id'];

    $sql = "SELECT content,title,author, created_at , updated_at FROM posts WHERE id=$postId";
    $result = $conn->query($sql);



    if ($result) {
        $row = $result->fetch_assoc();
        $content = $row['content'];
        $title = $row['title'];
        $author = $row['author'];
        $created_at = $row['created_at'];
        $updated_at = $row['updated_at'];


        $file_row = "";
        $filename = "";
        $filename_user = "";
        $filepath = "";

        $sql_file = "SELECT filename_user, filepath, filename FROM files WHERE post_id = $postId";
        $file_result = $conn->query($sql_file);

        if (mysqli_num_rows($file_result)>0) {
            $file_row = $file_result->fetch_assoc();
            $filename = $file_row['filename'];
            $filename_user = $file_row['filename_user'];
            $filepath = $file_row['filepath'];

            return include "board_content_page.php";
        }
        else {
        return include "board_content_page.php";
        }
  
     } 
     
     else {
        return include "access_failed.html";
     }  
     ?>


