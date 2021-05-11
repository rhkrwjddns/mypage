<!-- 모든 페이지의 섹션값은 헤더.php에서 정해주고 있다 -->
<!-- 로그인때 섹션값 부여하고 -->
<!-- 로그아웃때 섹션값 삭제한다 -->
<!-- 모든 페이지에서 섹션값 확인 후 가져온다. 섹션값 없으면 문자열 '' 저장한다. -->
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>

<div id="top">
    <h3>
	    <a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage/index.php">
        정운 웹페이지</a>
    </h3>

    <ul id="top_menu">
        <?php
            if(!$userid) {
                ?>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage/member/member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage/login/login_form.php">로그인</a></li>
                <?php
            } else {
                $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
                ?>
                <li><?php echo $logged ?> </li>
                <li> | </li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage/login/logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage/member/member_modify_form.php">정보 수정</a></li>
	            <li> | </li>
	            <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage/member/member_delete_form.php">회원 탈퇴</a></li>
                <?php
            }
        ?>
        <?php
            if($userlevel==1) {
                ?>
                <li> | </li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage/admin/admin.php">관리자 모드</a></li>
                <?php
            }
        ?>
    </ul>
</div>
<div id="menu_bar">
    <ul>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage/index.php">메인</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage/memo/message_box.php?mode=rv">쪽지</a></li>
        <!-- rv=리시브로 넘어가기 -->
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage/board/board_list.php">게시판</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage/image_board/board_list.php">이미지</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage/notice/notice_list.php">공지사항</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage/free/list.php">Q&A</a></li>
    </ul>
</div>