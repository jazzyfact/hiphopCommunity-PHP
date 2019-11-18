<!--메인 홈페이지-->


<!DOCTYPE html>
<html>
<head>
    <title>Hi Esens</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://kit.fontawesome.com/5d34d34100.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
</head>
<body>
<!--최상단 게시판 네비게이션-->
<div class="nav-bar">
    <div id="social-bar">
        <nav>
            <a href="/php/main.php"><img src ="../image/esens_emogi.png" width="30px" height="30px" " alt="">    Esens FanSite</a>
            <a href="#" class="nav-icon">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="nav-icon">
                <i class="fab fa-youtube"></i>
            </a>
            <a href="#" class="nav-icon">
                <i class="fab fa-instagram"></i>

            </a>
        </nav>
    </div>
    <!--최상단 메뉴바 이미지 클릭하면 게시판 목록들이 나타난다-->
    <div id="menu-bar">
        <nav>
            <a href="/php/login.php">
                <i class="fas fa-user-plus"></i>
            </a>
            <a href="#" onclick="showNavList();">
                <i class="fas fa-bars"></i>
            </a>
        </nav>
    </div>
    <!--최상단 게시판 네비게이션 목록들-->
    <!--메인,프로필,자유게시판,앨범,영상,콘서트-->
    <div id="list-bar">
        <nav>
            <a href="/php/main.php" class="list-logo">Esens</a>
            <a href="/php/profile.php">Profile</a>
            <a href="#">FreeTalk</a>
            <a href="#">Album</a>
            <a href="#">Video</a>
            <a href="#">Concert</a>
            <a href="#" onclick="showNavList();">
                <i class="fas fa-times"></i>
            </a>

        </nav>
    </div>
</div>
</body>
</html>
<!--클릭하면 최상단 게시판 내려오게 하는 코드-->
<script type="text/javascript">
    let showList = true;
    function showNavList() {
        //body..
        if(showList){
            document.getElementById('list-bar').classList.add('showList-bar');
            showList = false;
        }else {
            document.getElementById('list-bar').classList.remove('showList-bar');
            showList = true;

        }
    }
</script>