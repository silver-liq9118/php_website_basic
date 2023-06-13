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

    if (!empty($email)) {
    //로그인 했을 때
       
    // 게시판 기본 목록 불러오기
    $sql = "SELECT id, title, author, created_at FROM posts";
    $result = $conn->query($sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $rows = array();  // 결과 행을 저장할 배열
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;  // 각 행을 배열에 추가
            }

            include "board_page.php";       
            }}

    else {

    // 로그인 을 안했을 때
   
    include "access_failed.html"; }
                                        }
    
    catch ( Exception $e ) { 
    // 오류 발생 시 ?>     
<?php
        include "access_failed.html"; 
    }

?>