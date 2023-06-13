<?php
include "db_conn.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    $postId = $_GET['id'];

    $sql = "SELECT content FROM posts WHERE id=$postId";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $content = $row['content'];
        
        echo "<div>";
        echo "<h2>게시물 내용</h2>";
        echo "<p>" . nl2br($content) . "</p>";
        echo "</div>";
        }

?>