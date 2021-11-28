<?php
ob_start();
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include ("include/function.php");
include('include/loding.php');

if (isset($_SESSION['userid'])){

    $action = isset($_GET['action']) ? $_GET['action'] : 'Edit';

    if($action == 'Edit'){

        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) :0;

        $stmt = $con->prepare('SELECT * FROM users WHERE id = ? LIMIT 1 ');

        $stmt->execute(array($userid));

        $row = $stmt->fetch();
        
        $count =$stmt->rowCount();

        if($count > 0){ ?>

                <div class="information-edit text-center">
                    <form action="?action=Update" method="POST">
                    <input type="hidden" name='userid' value="<?php echo $userid ?>"/>
                    <div class="information-img">
                        <img class="information-imge-" name="img" src="../project-myserves/layot/img/<?php echo $row['imgg'] ?>"  id="uplodeimgedit" alt="">
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
                                            <label class="text-form " for="exampleInputEmail1">الأسم الاول</label>
                                            <input type="text" class="form-control" name="F_name" value='<?php echo $row['first_name'] ?>'  placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="mr-form">
                                            
                                            <label class="text-form" for="exampleInputEmail1">الأسم الأخير</label>
                                            <input type="text" class="form-control" name="L_name" value='<?php echo $row['last_name'] ?>' placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="mr-form">
                                            <label class="text-form " for="inputState">الجنس</label>
                                            <select id="inputState" class="form-control" name="gender">
                                                <option selected>ذكر</option>
                                                <option>أنثى</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="mr-form">
                                            <label class="text-form"  for="inputState">تاريخ الميلاد</label>
                                            <input type="date" class="form-control"  name="date_birth" value='<?php echo $row['date_birth'] ?>'> 
                                        </div>
                                    </div>  
                                    <div class="col-lg-4 col-md-6">
                                        <div class="mr-form">
                                            <label class="text-form" for="inputState">الدولة</label>
                                            <select id="inputState" class="form-control" name="Location">
                                                <option selected>الاردن</option>
                                                <option>سوريا</option>
                                                <option>السعودية</option>
                                                <option>الأمارات</option>
                                                <option>العراق</option>
                                                <option>قطر</option>
                                                <option>البحرين</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" col-lg-4  col-md-6">
                                        <div class="mr-form">
                                            <label class="text-form" for="phone">رقم الهاتف</label>
                                            <input type="tel" class="form-control" id="phone" name="phone"  value='<?php echo $row['Num_Phone'] ?>' placeholder="079-11-67887">
                                        </div>
                                    </div>
                                    <div class=" col-lg-4  col-md-6">
                                        <div class="mr-form">
                                            
                                            <label class="text-form" for="inlineFormInput">اسم المستخدم</label>
                                            <input type="text" class="form-control " id="inlineFormInput" name='name'  value='<?php echo $row['name'] ?>' placeholder="">
                                        </div>
                                    </div>
                                    <div class=" col-lg-4  col-md-6">
                                        <div class="mr-form">
                                            
                                            <label  class="text-form" for="inputPassword6">كلمة المرور الحاليه</label>
                                            <input type="password" id="inputPassword6" class="form-control" name="oldpassword"  value='<?php echo $row['password'] ?>' aria-describedby="passwordHelpInline">
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
            $Last_Name = $_POST['L_name'];
            $Gender = $_POST['gender'];
            $Date_Birth = $_POST['date_birth'];
            $Location = $_POST['Location'];
            $Phone = $_POST['phone'];
            $Name = $_POST['name'];
            $Pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : MD5($_POST['newpassword']);
            $image = $_POST['upload'];


            $formErrors = array();

            if(empty($First_Name)){
                $formErrors[] = 'First Name Cant Be <strong> Empty</strong>';
            }
            if(empty($Last_Name)){
                $formErrors[] = 'Last Name Cant Be <strong> Empty</strong>';
            }
            if(empty($Gender)){
                $formErrors[] = 'Gender Cant Be <strong> Empty</strong>';
            }
            if(empty($Date_Birth)){
                $formErrors[] = 'Date Birth Cant Be <strong> Empty</strong>';
            }
            if(empty($Location)){
                $formErrors[] = 'Location Cant Be <strong> Empty</strong>';
            }

            if(empty($Phone)){
                $formErrors[] = 'phone Cant Be <strong> Empty</strong>';
            }

            if(empty($Name)){
                $formErrors[] = 'Name Cant Be <strong> Empty</strong>';
            }

            foreach($formErrors as $error) {
                echo '<div class="alert alert-danger">' . $error . '</div>' ;
            }

            if(empty($formErrors)){

                $stm2 = $con->prepare("SELECT * FROM users WHERE name = ? AND id != ?");
                $stm2->execute(array($Name,$id));
                $count = $stm2->rowCount();
                

                if ($count == 1) {

                    echo '<div class="alert alert-danger">Sorry This User Is Exist</div>';
    
                } else {

                    $stmt = $con->prepare("UPDATE users SET 
                                                            first_name = ?, 
                                                            last_name = ?, 
                                                            gender = ?, 
                                                            date_birth = ?, 
                                                            Location = ?,
                                                            Num_Phone = ?,
                                                            name = ?,
                                                            password=?,
                                                            imgg = ?
                                                            WHERE id ='".$_SESSION['userid']."'");
                    $stmt->execute(array(
                                        $First_Name,
                                        $Last_Name,
                                        $Gender,
                                        $Date_Birth,
                                        $Location,
                                        $Phone,
                                        $Name,
                                        $Pass,
                                        $image,
                                        ));

                    echo '<div class="alert alert-success">Record Updated</div>';
                                        
                }
            }

        } else {

            echo "Sorry You Cant Browse This Page Directly";
            
        }

        echo "</div>";
    }

 } 
 ob_end_flush();
 
 ?>

<!--start-edit-infromation-->

<!--end-edit-infromation-->
<?php include ("include/footer.php");?>
