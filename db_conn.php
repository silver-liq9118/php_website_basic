<?php
// MySQL 연결 정보
$servername = "localhost"; #서버의 실제주소
$username = "root"; #mysql ID
$password = "1111"; # mysql password
$dbname = "kdt_test"; #사용할 데이터베이스 이름
// MySQL 연결
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// 연결 확인
if ($conn->connect_error) {
die("MySQL 연결 실패: " . $conn->connect_error);
}
?>