<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/mypage/db/db_connect.php";

    //** **************
    //입력된 데이터 체크
    //** **************
    $id = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];
    $email = $email1 . "@" . $email2;
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
    
    //** ************************
    //데이터 패턴체크(이름, 이메일)
    //** ************************
    $pattern = "/[가-힣]+/"; //한글 소리 마디
    if(!preg_match($pattern, $name)){
        alert_back($name."형식에 맞지 않습니다.");
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        alert_back($email."형식에 맞지 않습니다.");
    }
    
    //** **************
    //트랜잭션 처리 시작
    //** **************
    $success = true; //트랜잭션 플래그 선정
    $result = mysqli_query($con, "SET AUTOCOMMIT=0"); //반드시 자동 커밋은 0으로 설정
    $result = mysqli_query($con, "START TRANSACTION");    //트랜잭션 시작
    
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    $sql = "insert into members(id, pass, name, email, regist_day, level, point) ";
    $sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

    $result = mysqli_query($con, $sql); //$sql에 저장된 명령 실행
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    if(!$result) $success = false;  //오류발생으로 플래그값을 false선정

    if($success == false){
        $result = mysqli_query($con, "ROLLBACK");
        alert_back("insert 도중 문제가 발생했습니다. ROLLBACK 합니다.");
    }else{
        $result = mysqli_query($con,"COMMIT");
    }
    $result = mysqli_query($con,"SET AUTOCOMMIT=1");    //반드시 자동 커밋을 1로 트랜잭션 처리완료

    //** **************
    //데이터베이스 close
    //** **************
    mysqli_close($con);

    echo "
	      <script>
	           location.href = 'http://{$_SERVER['HTTP_HOST']}/mypage/index.php';
	      </script>
	  ";
?>


