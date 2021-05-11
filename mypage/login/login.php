<?php
 include_once $_SERVER['DOCUMENT_ROOT']."/mypage/db/db_connect.php";

  //전송된 post데이터 체크
  $id   = input_set($_POST["id"]);
  $pass = input_set($_POST["pass"]);

  //** ****************
  //call store procedure : ID, PASS CHECK
  //** ****************
   $sql = "call signin('$id','$pass',@resultCode)";
    $result = mysqli_query($con, $sql);

    $sql = "select @resultCode";
    $out_result = mysqli_query($con, $sql);

  //$out_row["@resultCode"] 또는 $out_row[0] =0,-1,-2 결과값을 가져온다.
  $out_row = mysqli_fetch_array($out_result);
  $resultCode = $out_row[0];

  if($resultCode == -1){
    alert_back("가입하지 않은 아이디이거나, 잘못된 아이디입니다.");
    exit;
  }else if($resultCode == -2){
    alert_back("잘못된 비밀번호입니다.");
    exit;
  }else if($resultCode == 0 ){
      $row = mysqli_fetch_array($result);

      session_start();
      $_SESSION["userid"] = $row["id"];
      $_SESSION["username"] = $row["name"];
      $_SESSION["userlevel"] = $row["level"];
      $_SESSION["userpoint"] = $row["point"];
                                                                                                                                                                                                                                                                                                                                                                                                  
    echo("
      <script>
      location.href = 'http://{$_SERVER["HTTP_HOST"]}/mypage/index.php';
      </script>
    ");
  }//end of if
?>
