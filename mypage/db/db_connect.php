<?php
    date_default_timezone_set("Asia/Seoul");
    $server_name = "localhost";
    $user_name = "root";
    $pass = "123456";
    $db_name = "sample";

    $con = mysqli_connect($server_name, $user_name, $pass);
    $query = "create database if not exists sample";
    $result = $con->query($query) or die($con->error);

    $con->select_db($db_name) or die($con->error);

    function alert_back($message){
        echo("
			<script>
			alert('$message');
			history.go(-1)
			</script>
			");
    }
    //공격적인 클라이언트를 방어하기 위한 함수
    function input_set($data){
        $data = trim($data);    //양쪽 공백 제거
        $data = stripslashes($data);    //슬래쉬역할 방어
        $data = htmlspecialchars($data);    //html 명령어 방어 예시 : '<'를 '&lt;'로 바꾸기
        return $data;
    }
?>