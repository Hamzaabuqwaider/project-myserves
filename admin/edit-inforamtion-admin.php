<?php 
    ob_start();
   $titlePage = "Edit-admin";
   session_start();
   include ("include/header-admin.php");
   include ("include/navadmin.php");
   include ("include/function.php");


   if(isset($_SESSION['admin'])){

    $action = isset($_GET['action']) ? $_GET['action'] : 'Edit';

    if($action == 'Edit'){

        $admin_id = isset($_GET['admin_id']) && is_numeric($_GET['admin_id']) ? intval($_GET['admin_id']) :0;

        $stmt = $con->prepare('SELECT * FROM admin WHERE id = ? LIMIT 1 ');

        $stmt->execute(array($admin_id));

        $row = $stmt->fetch();
        
        $count =$stmt->rowCount();

        if($count > 0){ ?>

                <div class="information-edit text-center">
                    <form action="?action=Update" method="POST">
                    <input type="hidden" name='userid' value="<?php echo $admin_id ?>"/>
                    <div class="information-img">
                        <img class="information-imge-" name="img" src="../project-myserves/admin/layot/img/<?php echo $row['img'] ?>"  id="uplodeimgedit" alt="">
                        <input type="file" id="uplode-img-edit" name="upload" onchange ="readUrledit(this)" hidden>
                        <abbr title="تغير الصوره الشخصية"> <div class="img-info" id="clickimgedite" onclick="uptateimge()"></abbr>
                        <i class="fas fa-camera"></i>
                    </div>
                </div>
                <div class="form-informayion text-center">
                    <div class="container">
                        <div class="form-edit">
                                <div class="form-row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="mr-form">
                                            <label class="text-form " for="exampleInputEmail1">الأســم</label>
                                            <input type="text" class="form-control" name="F_name" value='<?php echo $row['admin_name'] ?>'  placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="mr-form">
                                            <label class="text-form"  for="inputState"> البـريـد الإلكـترونـي</label>
                                            <input type="email" class="form-control"  name="email" value='<?php echo $row['email'] ?>'> 
                                        </div>
                                    </div>
                                    <div class=" col-lg-4  col-md-6">
                                        <div class="mr-form">
                                            
                                            <label  class="text-form" for="inputPassword6">كلمة المرور الحاليه</label>
                                            <input type="password" id="inputPassword6" class="form-control" name="oldpassword"  value='<?php echo $row['Password'] ?>' aria-describedby="passwordHelpInline">
                                        </div>
                                    </div>
                                    <div class=" col-lg-4  col-md-6">
                                        <div class="mr-form">
                                            
                                            <label  class="text-form" for="inputPassword6">كلمة المرور الجديده</label>
                                            <input  type="password" id="inputPassword6" class="form-control" name="newpassword" aria-describedby="passwordHelpInline">
                                        </div>
                                    </div>
                                </div>
                                <input class="btn" type="submit" value="حفظ التغيرات">
                            </form>   
                        </div>
                    </div>
                </div>
            <?php

        } else {

            echo "<div class='alert alert-danger' role='alert'>There is no such ID </div>";
        }

    } elseif($action == 'Update'){

        echo "<h1 class='text-center'>Update Member</h1>";
        echo "<div class='container'>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $id = $_POST['userid'];
            $First_Name = $_POST['F_name'];
            $email = $_POST['email'];
            $Pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : MD5($_POST['newpassword']);
            $image = $_POST['upload'];


            $formErrors = array();

            if(empty($First_Name)){
                $formErrors[] = 'First Name Cant Be <strong> Empty</strong>';
            }

            foreach($formErrors as $error) {
                echo '<div class="alert alert-danger">' . $error . '</div>' ;
            }

            if(empty($formErrors)){

                $stm2 = $con->prepare("SELECT * FROM admin WHERE admin_name = ? AND id != ?");
                $stm2->execute(array($First_Name,$id));
                $count = $stm2->rowCount();

                if ($count == 1) {

                    echo '<div class="alert alert-danger">Sorry This User Is Exist</div>';
    
                } else {

                    $stmt = $con->prepare("UPDATE admin SET 
                                                            admin_name = ?,
                                                            email = ?,
                                                            Password=?,
                                                            img = ?
                                                            WHERE id ='".$_SESSION['id_admin']."'");
                    $stmt->execute(array(
                                        $First_Name,
                                        $email,
                                        $Pass,
                                        $image,
                                        ));

                    echo "<script>alert('تم تعديل معلوماتك بنجاح ');</script>";
                    
                    $Location = "index-admin.php";

                    redirectHome($Location,2);
                                        
                }
            }

        } else {

            echo "Sorry You Cant Browse This Page Directly";
            
        }

        echo "</div>";
    }
include ("include/footer-admin.php");

 }else {

    header('Location: index.php');

    exit();
}

 
?>