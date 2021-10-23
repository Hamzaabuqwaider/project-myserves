<?php
session_start();
//ob_start();
include ('connect.php');
include ("mainLink.php");
include ('function.php');
if(isset($_SESSION['userid']))
{
    header('location: mainpage.php');
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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['signup'])) {
                    $formErrors = array();
                    $user = $_POST['name'];
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
                            $formErrors[]= 'Sorry Password Cant Be EMpty';
            
                        if($pass !== $password2) 
                            $formErrors[] = 'Sorry Password Not Match';
                        
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
                        $formErrors[]='Sorry This User Is Exists';
                }else{
                                    $hashPassword = md5($pass);

                                    $insert = $con->prepare("INSERT INTO 
                                                users(name,password,Email,type,date)
                                                VALUES(:zuser, :zpass, :zmail, :postType , now() )");
                                    $insert->execute(array(
                                        'zuser' =>$user,
                                        'zpass' =>$hashPassword,
                                        'zmail' =>$email,
                                        'postType'=>$_POST['type']
                                     ));
                                 $successMsg = ' You Are Now Registerd User';
                     }
                 } 
            }

        } 
         
     ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="sign-up-form" method="POST">
                <h2 class="title-login">حساب جديد</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input
                    type="text" 
                    name="name"
                    autocomplete="off"
                    placeholder="اسم المستخدم"
                    pattern=".{4,}"
                    title="Username Must Be 4 Chars"
                    required
                    />
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
                </div>
                <div class="input-field">
                     <i class="fas fa-calendar-check"></i>
                        <select
                            name="type"
                            aria-label="Default select example">
                            <option selected value='1'>مستخدم عادي</option>
                            <option value='2'>عميل</option>
                        </select>                
                    </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input
                      type="password" 
                      name="pass"
                      autocomplete="new-password"
                      placeholder="كلمة السر"
                      minlength="4"
                      required
                      />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input 
                     minlength="4"
                     type="password"
                     name="pass2"
                     autocomplete="new-password"
                     placeholder=" تأكيد كلمة السر "
                     required/>
                </div>

                <input type="submit" name="signup" value="انشاء حساب " class="btn-login-sign-in">
            </form>
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
                <button id="sign-up-btn" onclick="addclassnewaccount()"  class="btn-login-sign-in transparent">حساب جديد</button>
            </div>
           <img src="layot\img\undraw_online_ad_re_ol62.svg" class="image-sign-in">
        </div> 
    </div>
</div>

