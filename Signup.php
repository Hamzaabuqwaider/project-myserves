<?php
$titlePage = "Signup";
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
        <div class="login-containers sign-up-mode" id="login-container">
        <div class="forms-container">
            <div class="signin-signgup">
                
    <?php 
    ////////////////////////////////////////Sign-Up//////////////////////////////////////

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
                            $formErrors[]='الاميل غير صحيح';
                        }
                    }
                if(empty($formErrors)){
                    $check = CheckReg("first_name","users", $user);
                
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
                            $successMsg ='<script>alert("  You Are Now Registerd User ")</script>';
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
                    required

                    
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
                    required


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
                    required

                    />
                    <span class="span-form-pas2">
                    <?php
                    if (!empty($filterdUuser)){
                        foreach ($formErrors as $ERRORR) { 
                            $E1 = 'This Email Is Not Valid';
                            if($E1 == $ERRORR){
                                ?>
                                <i style="color:red ;font-size: 15px;" class="fas fa-exclamation-triangle span-erorr"></i>
                                <?php
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
                            <option selected value='1'>مقدم خدمة </option>
                            <option value='2'>مستخدم عادي</option>
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
                    required

                    />
                    <span class="span-form-pas2">
                    <?php
                      if (!empty($filterdUuser)){
                        foreach ($formErrors as $ERRORR) {
                            $E1 = 'ادخل كلمة السر';
                            if($E1 == $ERRORR){
                                ?>
                                <i style="color:red;font-size: 15px;" class="fas fa-exclamation-triangle span-erorr"></i>
                                <?php
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
                    required
                    />
                    <span  class="span-form-pas2">
                    <?php
                      if (!empty($filterdUuser)){
                        foreach ($formErrors as $ERRORR) { 
                            $E1 =  'كلمة السر غير متطابقة';
                            if($E1 == $ERRORR){
                                ?>
                                <i style="color:red;font-size: 15px;" class="fas fa-exclamation-triangle span-erorr"></i>
                                <?php
                             echo $ERRORR;
                            }
                        }
                           
                   }
                    ?>
                   </span>

                </div>

                <input type="submit" onclick="createAlert('','Nice Work!','Here is a bunch of text about some stuff that happened.','success',true,true,'pageMessages');" name="signup" value="انشاء حساب " class="btn-login-sign-in">
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
                <a href="main-login.php"><button id="sign-in-btn"  class="btn-login-sign-in transparent">تسجيل الدخول</button></a>
            </div>
            <img src="layot\img\undraw_Code_thinking_re_gka2.svg" class="image-sign-in">
        </div> 

        <div class="panel left-panel">
        </div> 
    </div>
</div>

    <?php 
        ob_end_flush();
    ?>


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
