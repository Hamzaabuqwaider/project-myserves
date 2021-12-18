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

<?php include ("include/footer.php");?>
</body>
</html>
