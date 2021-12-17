<?php
session_start();
include ("../include/connect.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedPass = MD5($password);

    // Check If the user Exist In DataBase

    $stmt=$con->prepare('SELECT
                                id,email,Password 
                            FROM 
                                admin
                            WHERE 
                                email = ? 
                            AND 
                                Password = ? 
                            LIMIT 1');
    $stmt->execute(array($email,$hashedPass));
    $row = $stmt->fetch();
    $count =$stmt->rowCount();

        //If Count > 0 This Mean the database contain Record About This User_Name

        if($count > 0){

            $_SESSION['admin'] = $email; // Register Session Name
            $_SESSION['id_admin'] = $row['id']; // Register Session ID
            header('Location: index-admin.php');//Redirect To Dashoard Page 
            exit();
        }
        
    }

?>
<html>
<head>
    <meta charset="UTF-8" />
    <!-- IE Compatibility Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- First Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="layot/css/bootstrap.min.css">
    <link rel="stylesheet" href="layot/css/mainadmin.css">
    <link rel="stylesheet" href="layot/css/media.css">
    <link rel="stylesheet" href="layot/css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body style="background: #212529b0;">

     <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <div class="cont">
        <div class="form sign-in">
        <h2 class="navbar-brand logo"><span>خد</span>متك</h2>
            <label>
            <span>البريد ألالكتروني </span>
            <input type="email" name="email" />
            </label>
            <label>
            <span>كلمة ألسر</span>
            <input type="password" name="password" />
            </label>
            <a href="#" class="forgot-pass">هل نسيت كلمة السر؟</a>
            <button type="submit" class="submit">تسجيل ألدخول</button>
        </div>
        <div class="sub-cont">
            <div class="img">
            <div class="img__text">
                <h2>Admin</h2>
                <p>تسجيل الدخول ألى لوحة التحكم والسيطرة</p>
            </div>
            </div>
      </form>
        

<a href="https://dribbble.com/shots/3306190-Login-Registration-form" target="_blank" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
</a>
<a href="https://twitter.com/NikolayTalanov" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
</a>
        
<?php include ("include/footer-admin.php");?>