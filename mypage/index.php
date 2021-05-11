<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA_Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/main.css">
    <script src="js/common.js" defer></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <title>homepage</title>
</head>

<body>
    <!--header-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/mypage/header.php"; ?>   
    </header>
    
    <!--section-->
    <section>
        <?php include $_SERVER['DOCUMENT_ROOT']."/mypage/main.php"; ?>
    </section>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/mypage/footer.php"; ?>
    </footer>
    
    </body>
</html>