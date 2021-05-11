<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/mypage/db/db_connect.php";
    $id = $_POST["id"];

    $sql = "delete from members  where id='$id'";
    $value = mysqli_query($con, $sql) or die('error : ' . mysqli_error($con));

    if($value){
        echo"<script>
            alert('탈퇴처리 되었습니다. 이용해주셔서 감사합니다.');
        </script>"
    }else{
        echo"<script>
            alert('탈퇴 실패. 관리자에게 문의하세요.');
            history.go(-1);
        </script>"
    }
    include_once $_SERVER['DOCUMENT_ROOT'] . "/mypage/login/logout.php";
?>






