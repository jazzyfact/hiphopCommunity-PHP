<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>full width profile card design</title>

    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<!--프로필 화면 수정중 깃 마스터에 잘못올림-->
    <style>
        @import url('https://i.icomoon.io/public/c88de6d4a5/JeffPannoneWeb/style.css');
        *, *:before, *:after {
            box-sizing: inherit;
        }
        html {
            box-sizing: border-box;
        }
        html, body, .page-wrap {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Oswald', sans-serif;
            font-size: 100%;
            font-weight: 400;
            line-height: 1;
            overflow: hidden;
            background: #000;

        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Oswald', sans-serif;
            font-weight: 400;
            text-transform: uppercase;
            color: white;
            letter-spacing: 2px;
        }
        i {
            position: relative;
        }
        .overlay {
            position: absolute;
            z-index: 1;
            top: -10%;
            left: -10%;
            width: 120%;
            height: 120%;
            background:  rgb(0,0,102);
            background: linear-gradient(0deg, rgb(0, 0, 102)0%, rgba(153, 051, 204, 1)100%);
            background-position: center center;
            background-size: 100%;
            opacity: 1;
            filter: blur(5px);

            background-size: cover;
        }
        @keyframes Gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        .page-wrap {
            position: relative;
            z-index: 100;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            /*background-image: url("");*/
            background-size: cover;
            background-position: center;
            height: 100vh;

        }
        .wrap-center {
            width: 480px;
            overflow: hidden;
            transition: width 0.5s, background 0.5s;
        }
        .wrap-center.expand-width {
            width: 630px;
        }
        .light-theme .wrap-center {
            background: rgba(255, 255, 255, .0);
            color: rgba(0, 0, 0, .7);
        }
        .light-theme .wrap-center.bio-active {
            background: rgba(255, 255, 255, .3);
        }
        .dark-theme .wrap-center {
            background: rgba(0, 0, 0, .0);
            color: rgba(255, 255, 255, .9);
        }
        .dark-theme .wrap-center.bio-active {
            background: rgba(0, 0, 0, .3);
        }
        .header {
            width: 100%;
            position: relative;
            padding: 30px 0;
            font-size: 1.2rem;
            border-bottom: 1px solid rgba(0, 0, 0, .0);
            transition: border-bottom-color 0.5s;
        }
        .expand-width .header {
            border-bottom-color: rgba(0, 0, 0, .075);
        }
        .header .hello-h1 {
            display: block;
            cursor: pointer;
            font-size: 2.2em;
            margin-bottom: 25px;
            font-weight: 700;
            transition: font-size 0.5s;
            color: white;
            letter-spacing: 2px;
        }
        .expand-width .header .hello-h1 {
            font-size: 1.5em;

        }
        .header .name {
            display: block;
            margin: 15px 0;
            font-size: 1.2em;
            color: white;
        }
        .header .avatar {
            width: 180px;
            margin: 0 auto;
            backface-visibility: hidden;
            opacity: 1;
            transition: opacity 0.5s, width 0.5s;
            border: 3px solid white;
            border-radius: 150px;
            padding: 7px;
        }
        .expand-width .header .avatar {
            opacity: 0.5;
            width: 90px;
        }
        .expand-width .header .avatar:hover {
            opacity: 1;
        }
        .header img {
            display: block;
            width: 100%;
            border-radius: 100%;
        }
        .main-nav {
            position: relative;
            padding-bottom: 40px;
        }
        .main-nav ul li {
            display: inline-block;
        }
        .main-nav .nav-btn {
            cursor: pointer;
            display: block;
            font-size: 0.75em;
            text-transform: none;
            padding: 0.95em;
            margin: 2px 0;
            width: 120px;
            border-radius: 100px;
            backface-visibility: hidden;
            transition: background 0.3s;
            background: white;


        }
        .main-nav .nav-btn:hover {
            background: rgba(0, 0, 0, 0.25);
        }
        .main-nav .nav-btn i {
            font-size: 70%;
            top: -0.075em;
        }
        .toggle-about {
            cursor: pointer;
            border-radius: 100%;
            height: 36px;
            width: 36px;
            position: absolute;
            left: 50%;
            margin-left:-21px;
            margin-top: 30px;
            padding: 10px 0 0 1px;
            text-align: center;
            font-size: 0.7em;
            display: block;
            transform: rotate(0deg);
            transition: transform 0.3s;
            backface-visibility: hidden;
            transition: background 0.3s;
            border: 3px solid white;
            color: white;
        }
        .toggle-about:hover {
            background: rgba(0, 0, 0, 0.25);
        }
        .expand-height .toggle-about {
            transform: rotate(180deg);
        }
        .about {
            font-weight: 400;
            width: 100%;
            padding: 40px 60px 0px;
            text-align: left;
            overflow: hidden;
            height: 0px;
            padding-top: 0px;
            padding-bottom: 0px;
            transition: height 0.5s, padding-top 0.2s;
        }
        .about .copy-block {
            padding-top: 40px;
        }
        .expand-height .about {
            height: 450px;
        }
        .about .close-about {
            margin: 0 auto;
            font-size: 2.2em;
        }
        .about h2 {
            font-size: 1.5em;
            margin: 0;
            font-weight: 600;
            margin-bottom: 0.5em;

        }
        .about p {
            margin-bottom: 1.25em;
            font-size: 0.9em;
            line-height: 1.7;
        }



    </style>
</head>
<body>
<div class="overlay"></div>

<div class="page-wrap light-theme">

    <div class="wrap-center">
        <header class="header">
            <div class="avatar">
                <div class=""></div>
                <img src="../image/esens_profile.jpg" alt="Jeff Pannone">
            </div>

            <span class="name">Esens </span>
            <h1 class="hello-h1">PROFILE</h1>
            <nav class="main-nav">
                <span class="toggle-about"><i class="i-chevron-down"></i></span>

            </nav>
        </header>

        <div class="about" id="about">
            <div class="copy-block">
                <h2>About</h2>
                <p>이름 : 강민호</p>
                <p>예명 : Esens(a.k.a Bianky Munn)</p>
                <p>출생 : 1987년 2월 9일, 경산북도 경산시</p>

                <h2>Ecommerce/CX</h2>
                <p>2003년에 대구 클럽 HEAVY에서 활동을 시작하였으며, 2007년 부터 2013년 까지 사이먼 도미닉과 힙합 듀오 슈프림팀을 이루어 활동하였다.
                    슈프림팀 활동 당시에는 아메바 컬쳐 소속이었고, 크루는 지기 펠라즈와 일리스트 컨퓨젼에 속해 있었다.
                    이후 2014년 부터 기획사 Beasts And Natives Alike (BANA)에 소속되어 2015년 8월 27일, 솔로 데뷔 음반이자 첫 정규 음반인 《The Anecdote》를 발매하였다.
                    2019년 7월 22일, 정규 2집 음반인 《이방인》을 발매하였다.</p>
            </div>



        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    // default state of bio
    var bioActive = false;

    // toggle bio with animations/timing relative to its state
    // if closed, expand width first, then height
    // if open, expand height first, then width
    function toggleBio(){
        if(bioActive == false){
            firstClass = 'expand-width';
            secondClass = 'expand-height';
            bioActive = true;
        }else{
            firstClass = 'expand-height';
            secondClass = 'expand-width';
            bioActive = false;
        }

        $(".wrap-center").toggleClass("bio-active").toggleClass(firstClass).delay(500).queue(function(){
            $(this).toggleClass(secondClass).dequeue();
        });
    }

    // run bio toggle on click
    $(".btn-about, .close-about, .toggle-about").on("click", toggleBio);


</script>
</body>
</html>