<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="webstoryboy">
    <meta name="description" content="웹스토리보이 포트폴리오 사이트입니다.">
    <meta name="keywords" content="웹표준, 웹접근성, 사이트만들기, 포트폴리오, 웹스토리보이">
    <title>Jangareum Portfolio</title>
    <!-- CSS Style -->
    <link rel="stylesheet" href="../assets/css/reset.css">    
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- webfonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
</head>
<body>
    <!-- skip -->
    <div id="skip">
        <a href="#mainCont">콘텐츠 바로가기</a>
    </div>
    <!-- //skip -->
    <!-- header -->
    <header id="header" class="black">
        <?php
            include '../component/header.php';
        ?>
    </header>
    <!-- //header -->
    <main>
        <!-- mainCont -->
        <section id="mainCont">
<?php
    include '../connect/connect.php';
    include '../connect/session.php';
    // echo $_POST['userEmail'], "<br>";
    // echo $_POST['userName'], "<br>";
    // echo $_POST['userNickName'], "<br>";
    // echo $_POST['userPW'], "<br>";
    // echo $_POST['birthYear'], "<br>";
    // echo $_POST['birthMonth'], "<br>";
    // echo $_POST['birthDay'], "<br>";
    $userEmail = $_POST['userEmail'];
    $userName = $_POST['userName'];
    $userNickName = $_POST['userNickName'];
    $userPW = $_POST['userPW'];
    $birthYear = $_POST['birthYear'];
    $birthMonth = $_POST['birthMonth'];
    $birthDay = $_POST['birthDay'];

    //에러 : 경고창
    function errorAlert($alert){
        echo "<div class='errorAlert'>{$alert}<a href='signUp.php'>회원가입 다시하기</a><a href='logIn.php'>로그인 다시하기</a></div>";
        return;
    }
    //이메일 검사
    if( !filter_Var($userEmail, FILTER_VALIDATE_EMAIL) ){
        errorAlert('올바른 이메일이 아닙니다.');
        exit;
    }
    //이름이 한글로 구성되어 있는지 확인(정규식 표현법)
    $userNamePattern = '/^[가-힣]{1,}$/';
    if( !preg_match($userNamePattern, $userName, $matches) ){
        errorAlert('한글로 이루어진 이름이 아닙니다.');
        exit;
    }
    //유효성 검사
    if( $userName == null || $userName == '' ){
        errorAlert('이름을 입력해주세요!!');
        exit;
    }
    if( $userNickName == null || $userNickName == '' ){
        errorAlert('닉네임을 입력해주세요!!');
        exit;
    }
    if( $userPW == null || $userPW == '' ){
        errorAlert('패스워드를 입력해주세요!!');
        exit;
    }
    if( $birthYear == 0 ){
        errorAlert('생일 년도를 선택해 주세요');
        exit;
    }
    if( $birthMonth == 0 ){
        errorAlert('생일 월을 선택해 주세요');
        exit;
    }
    if( $birthDay == 0 ){
        errorAlert('생일 일을 선택해 주세요');
        exit;
    }
    $birth = $birthYear.'-'.$birthMonth.'-'.$birthDay;
    //이메일 중복 검사
    $userEmailCheck = false;
    $sql = "SELECT youEmeail FROM myMember WHERE youEmeail = '{$userEmail}'";
    $result = $dbConnect -> query($sql);
    if ( $result ){
        $count = $result -> num_rows;
        if( $count == 0 ){
            $userEmailCheck = true;
            //echo "youEmail X";
        } else {
            //echo "youEmail O";
            errorAlert('이메일이 중복됩니다. 다시 한번 확인해주세요!');
            exit;
        }
    } else {
        errorAlert('에러발생 : 관리자에게 문의하세요!(1)');
        exit;
    }
    // 닉네임 중복 검사
    $userNickNameCheck = false;
    $sql = "SELECT youNic