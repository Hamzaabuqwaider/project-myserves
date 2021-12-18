
<?php
$titlePage = "login";
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/function.php");
// include('include/loding.php');

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
                        <input type="text"
                            name="username"
                            id ="username"
                            placeholder="اسم المستخدم">

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
                
    <?php 

    ///////////////////////////////////////////////////Sign-Up/////////////////////////////////////////////

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['signup'])) {
                    $formErrors = array();

                    $user1 = $_POST['name1'];
                    $user2 = $_POST['name2'];
                    $pass = $_POST['pass'];
                    $password2 = $_POST['pass2'];
                    $email = $_POST['Email'];
                    $type = $_POST['type'];
                    

                    if(isset($user)){
                        $filterdUuser = filter_var($user,FILTER_SANITIZE_STRING);
                        if (strlen($filterdUuser) < 4) 
                            $formErrors[] = 'Username Must Be Larger Than 4 Charachter';
                    }

                    if(isset($pass) || isset($password2) ){
        
                        if(empty($pass))
                            $formErrors[] = 'ادخل كلمة السر';
            
                        if($pass !== $password2) 
                            $formErrors[] = 'كلمة السر غير متطابقة';
                        
                    }

                    if(isset($email)) {
                        $filterdEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
                        if (filter_var($filterdEmail, FILTER_VALIDATE_EMAIL ) != true){
                            $formErrors[]='This Email Is Not Valid';
                        }
                    }
                if(empty($formErrors)){
                    $check = CheckReg("name","users", $user);
                
                    if($check == 1){
                        $formErrors[]='<script>alert(" الأسم مستخدم ")</script>';
                }else{
                                    $hashPassword = md5($pass);

                                    $insert = $con->prepare("INSERT INTO 
                                                users(first_name,last_name,password,Email,type,date)
                                                VALUES(:zuser1,:zuser2, :zpass, :zmail, :postType , now() )");
                                    $insert->execute(array(
                                        
                                        'zuser1' =>$user1,
                                        'zuser2' =>$user2,
                                        'zpass' =>$hashPassword,
                                        'zmail' =>$email,
                                        'postType'=>$_POST['type']


                                     ));
                                     echo "<script>alert('تم اضافتك بنجاح بإنتظار الموافقه');</script>";

                                 

                     }
                 } 
            }
        } 
    ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="sign-up-form" method="POST" id="form-main-logout">
                <h2 class="title-login">حساب جديد</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input
                    type="text" 
                    name="name1"
                    autocomplete="off"
                    placeholder= "الأسم الأول "
                    pattern=".{3,}"
                    id="text1"
                    
                    />
                    <span style="position: relative;" id="span-form" class="span-form-one">
                    <?php
                      if (!empty($filterdUuser)){
                        foreach ($formErrors as $ERRORR) { 
                            $E1 = 'Username Must Be Larger Than 4 Charachter' ;
                            if($E1 == $ERRORR){
                                echo $ERRORR;
                            }
                        }
                           
                   }
                    ?>
                    </span>
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input
                    type="text" 
                    name="name2"
                    autocomplete="off"
                    placeholder="الأسم ألأخير"
                    pattern=".{4,}"
                    

                    />
                    <span style="position: relative;" class="span-form-tow"></span>

                </div>
                <div class="input-field">
                <i class="fas fa-envelope"></i>
                    <input 
                    name="Email"    
                    type="email" 
                    autocomplete="off"
                    placeholder="البريد الالكتروني"
                    />
                    <span style="position: relative;"  class="span-form-email">
                    <?php
                     if (!empty($filterdUuser)){
                         foreach ($formErrors as $ERRORR) { 
                            $E1 = 'This Email Is Not Valid';
                            if($E1 == $ERRORR){
                                echo $ERRORR;
                            }
                         }
                            
                    }
                    ?>
                    </span>

                </div>
                <div class="input-field">
                    <i class="fas fa-calendar-check"></i>
                        <select
                            name="type"
                            aria-label="Default select example "  >
                            <option selected value='1'>مستخدم عادي</option>
                            <option value='2'>عميل</option>
                        </select>                
                    </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input
                    id="input-1"
                    type="password" 
                    name="pass"
                    autocomplete="new-password"
                    placeholder="كلمة السر"
                    minlength="4"
                    />
                    <span class="span-form-pas1">
                    <?php
                      if (!empty($filterdUuser)){
                        foreach ($formErrors as $ERRORR) { 
                            $E1 = 'ادخل كلمة السر';
                            if($E1 == $ERRORR){
                                echo $ERRORR;
                               
                            }
                        }
                           
                   }
                    ?>
                    </span>

                </div>
                <div class="input-field">
                <i class="fas fa-lock"></i>
                    <input 
                    id="input-2"
                    minlength="4"
                    type="password"
                    name="pass2"
                    autocomplete="new-password"
                    placeholder=" تأكيد كلمة السر "
                    />
                    <span  class="span-form-pas2">
                    <?php
                      if (!empty($filterdUuser)){
                        foreach ($formErrors as $ERRORR) { 
                            $E1 =  'كلمة السر غير متطابقة';
                            if($E1 == $ERRORR){
                             echo $ERRORR;
                            }
                        }
                           
                   }
                    ?>
                   </span>

                </div>

                <input type="submit" onclick="v()" id="btn-1" name="signup" value="انشاء حساب " class="btn-login-sign-in">
            </form>
            <?php 
            if (isset($successMsg)) {
                echo  $successMsg  ;
            }
        ?>
        </div>
    </div>
    
    <div class="panels-container">
        <div class="panel right-panel">
            <div class="content">
                <h3><span>خد</span>متك</h3>
                <p>اذا كان لديك حساب سجل دخولك من هنا  </p>
                <button id="sign-in-btn" onclick="removeclassnewaccount()" class="btn-login-sign-in transparent">تسجيل الدخول</button>
            </div>
            <img src="layot\img\undraw_Code_thinking_re_gka2.svg" class="image-sign-in">
        </div> 

        <div class="panel left-panel">
            <div class="content">
                <h3><span>خد</span>متك</h3>
                <p>اذا كنت جديد سجل حسابك من هنا </p>
                <button id="sign-up-btn"  onclick="addclassnewaccount()" class="btn-login-sign-in transparent">حساب جديد</button>
            </div>
            <img src="layot\img\undraw_online_ad_re_ol62.svg" class="image-sign-in">
        </div> 
    </div>
</div>
<?php 
            if (!empty($filterdUuser)){
                foreach ($formErrors as $error){
                    echo '<div class="msg error">' . $error .'</div>';
                }
            }
            if (isset($successMsg)) {
                echo '<div class="msg success">' . $successMsg . '</div>' ;
            }
        ?>
    <?php 
        ob_end_flush();
    ?>

<?php include ("include/footer.php");?>
</body>
</html>
