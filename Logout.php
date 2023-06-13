<?php
include "Login.php";

$_SESSION = array(); // 세션 변수 배열을 비웁니다.

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy(); // 세션을 파괴합니다.

// 로그인 페이지로 이동합니다.
header("Location: Login_page.php");
exit;
?>