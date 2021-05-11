<?php
  session_start();
  // 세션값을 없애기
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  unset($_SESSION["userlevel"]);
  unset($_SESSION["userpoint"]);
  
  echo("
       <script>
          location.href = 'http://{$_SERVER['HTTP_HOST']}/mypage/index.php';
         </script>
       ");
?>
