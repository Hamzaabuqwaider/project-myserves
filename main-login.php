<?php
$titlePage = "login";
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/function.php");
include('include/loding.php');

if(isset($_SESSION['userid']))
{
    header('location: index.php');
}
 ?>
    <?php 
    if(isset($_POST['login']))
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username=$_POST['username'];
            $password = md5($_POST['password']);
        login($username,$password);
        }

        }
    ?>
        <div class="login-containers" id="login-container">
        <div class="forms-container">
            <div class="signin-signgup">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="sign-in-form" method="POST">
                    <h2 class="title-login">تسجيل الدخول</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email"
                            name="username"
                            id ="username"
                            placeholder=" البريد الاكتروني">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password"
                            name="password"
                            placeholder="كلمة السر"
                            id ="password">
                    </div>

                    <input type="submit" name="login" value="تسجيل الدخول" class="btn-login-sign-in">
                    <a href="#" class="forget-passowrd-login">نسيت كلمة السر؟</a>
                </form>
        </div>
    </div>
    
    <div class="panels-container">
        <div class="panel right-panel">
            
        </div> 

        <div class="panel left-panel">
            <div class="content">
                <h3><span>خد</span>متك</h3>
                <p>اذا كنت جديد سجل حسابك من هنا </p>
                <a href="Signup.php"><button id="sign-up-btn" class="btn-login-sign-in transparent">حساب جديد</button></a>
            </div>
            <img src="layot\img\undraw_online_ad_re_ol62.svg" class="image-sign-in">
        </div> 
    </div>
</div>
<script src="layot/js/jquery-3.5.1.min.js"></script>
        <script src="layot/js/popper.min.js"></script>
        <script src="layot/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://pagead2.googlesyndication.com/pagead/managed/js/adsense/m202110050101/show_ads_impl_fy2019.js" id="google_shimpl"></script><script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
        <script src="layot/js/ajax.js"></script>
        <script src="layot/js/main.js"></script>
        <script src="layot/js/wow.min.js"></script>
        <script>
          AOS.init();
        </script>
        <script>new WOW().init();</script>
        
</body>
</html>
