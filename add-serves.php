<?php
$titlePage = "add-serves";
ob_start();
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include ("include/function.php");
include('include/loding.php');

if (isset($_SESSION['userid'])) {
    
        $action = isset($_GET['action']) ? $_GET['action'] : 'Add';
            if($action == 'Add') { 
        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) :0;
        $stmt2 = $con->prepare("SELECT * FROM sub_category");
        $stmt2 ->execute();
        $sub_categories = $stmt2->fetchAll();

        $stmt1 = $con->prepare("SELECT * FROM main_categories ORDER BY `type`"); 
        $stmt1 ->execute();
        $result = $stmt1->fetchAll();
        $categories = [];
        foreach($result as $category){
            $data = [];
            $data["id"] = $category["id"];
            $data["title"] = $category["title_cat"];

            if($category["type"] == "S")
                $categories["services"][] = $data;
            else
                $categories["freelance"][] = $data;
        }
    
        ?>
        
            <h1 class="name-section">اضافة خدمة</h1>
            <div class="container">
                <div class="add-serves-container">
                <form action="add-serves.php?action=Insert&userid" method="POST" enctype = "multipart/form-data">
                    <div class="form-group">
                            <label for="formGroupExampleInput">اسم الخدمة:</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="اسم الخدمة" maxlength="20">
                        <label for="formGroupExampleInput">نوع الخدمة:</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary btn-add-serves-select active">
                                    <input type="radio"  name="options" id="option1 " onclick="myFunctionfreelance()" checked> عمل حر
                                    <?php (checkCat("F")); ?>
                                </label>
                                <label class="btn btn-secondary btn-add-serves-select">
                                    <input type="radio" name="options" id="option2 " onclick="myFunctionservices()" > خدمات
                                    <?php (checkCat("S")); ?>
                                </label>
                        </div><br><br>
                        <label for="formGroupExampleInput" style="display: inline-block;">القسم:</label>
                        <select id="add_main_select" name="main-cat" class="form-control section-add-serves">
                            <option>القسم الرئيسي</option>
                            
                        </select>
                        <select id="add_sub_select" name="sub-cat" class="form-control section-add-serves">
                            <option>القسم الفرعي</option>
                            
                        </select><br><br>
                        <label for="validationTextarea">وصف الخدمة:</label>
                        <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <label for="exampleFormControlFile1">صورة الخدمة:</label>
                          <!--upload-->
                        <div class="main_full">
                            <div class="container">
                                <div class="panelss">
                                    <div class="button_outer">
                                        <div class="btn_upload">
                                            <input name="upload"  type="file" id="uploadss_file">
                                            <i class="far fa-images" style="color:#ddd;font-size:16px;"></i> إضافة صورة
                                        </div>
                                        <div class="processing_bar"></div>
                                        <div class="success_box"></div>
                                    </div>
                                </div>
                                <div class="error_msg"></div>
                                <div class="uploaded_file_view" id="uploaded_view">
                                    <span class="file_remove">X</span>
                                </div>
                            </div>
                        </div>
                            <!--upload-->
                    </div>
                    <button type="submit" class="btn btn-add-serves" style="border-radius:30px"><i class="fas fa-plus-circle"></i>&nbsp;اضافة الخدمة</button>
                </form>
                </div>
            </div>
            
            <script>
                //freelance select
                function myFunctionfreelance() {

                let categories = <?= json_encode($categories,true); ?>;
                let items = ``;
                for (var i = 0; i < categories.freelance.length; i++) 
                {
                    items += `<option >${categories.freelance[i].title}</option>`;
            
                }
                  document.getElementById("add_main_select").innerHTML =items;
                }
                //serves select
                function myFunctionservices() {

                let categories = <?= json_encode($categories,true); ?>;
                let items = ``;
                for (var i = 0; i < categories.services.length; i++) 
                {
                    items += `<option >${categories.services[i].title}</option>`;

                }
                  document.getElementById("add_main_select").innerHTML =items;
                }
                
            </script>
         <?php } 
                    elseif($action == 'Insert') {
                
                // $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) :0;
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
               
                   
                    $name        = $_POST['name'];
                    $sub_c       = $_POST['sub-cat'];
                    $main_c    = $_POST['main-cat'];
                    $Body        = $_POST['body'];
                    $imageName   = $_FILES['upload']['name'];
                    $imageSize   = $_FILES['upload']['size'];
                    $imageTemp   = $_FILES['upload']['tmp_name'];
                    $imageType   = $_FILES['upload']['type'];
                    $imageAllowedExtentions = array("jpeg" , "jpg", "png" , "gif");
                    $imageExtension = strtolower(end(explode('.' , $imageName)));
                    $formErrors = array();
                    if(empty($name)) {
                        $formErrors[] = 'يرجى إدخال الإسم';
                    }
                    if(empty($main_c)) {
                        $formErrors[] = 'يرجى إدخال القسم الرئيسي';
                        }
                    if(empty($sub_c)) {
                        $formErrors[] = 'يرجى إدخال القسم الفرعي';
                        }
                    if(empty($Body)) {
                        $formErrors[] = 'يرجى إدخال وصف الخدمه';
                    }
                    if(!empty($imageName) && ! in_array($imageExtension,$imageAllowedExtentions)){
                        $formErrors[] = 'هذا البرنامج لا يدعم امتداد هذه الصوره';

                    }
                    if(empty($imageName)) {
                        $formErrors[] = 'يرجى إدخال صوره ';
                    }
                    // echo '<div class="alert alert-danger">' . $erros . '</div>';
                    foreach($formErrors as $erros){
                        echo "<script>alert('$errors');</script>";
                        $location ="add-serves.php";
                        redirect($location);
            
                    }
                    
                    // Check If There's No Error Proceed The Update Operation
                    if(empty($formErrors)){

                                $image = rand(0 , 100000) . '_' . $imageName;
                                move_uploaded_file($imageTemp,'layot/img/' .$image);
                            // Insert Userinformation In The Database
                                $stmt = $con->prepare("INSERT INTO 
                                            post (title , body , category_id , user_id , main_title, img )
                                            VALUES(:zname, :zbody, :zsub , :userid , :zmain , :zimg )");
                                $stmt->execute(array(
                                    'zname'     =>$name,
                                    'zbody'     =>$Body,
                                    'zsub'      =>$sub_c,
                                    'userid'    =>$_SESSION['userid'],
                                    'zmain'     =>$main_c,
                                    'zimg'      =>$image
                             
                            ));
                            echo '<script>alert("تم تقديم خدمتك.. بإنتظار موافقة الأدمن")</script>';
                            $location ="index.php";
                            redirect($location);

                                }else {
                                echo '<script>alert("فشل في إضافة الخدمه")</script>';
                                $location ="index.php";
                                redirect($location);
                                } 
                        }       
                        echo "</div>";                 
                }   else {
                    echo '<script>alert("لا يمكنك الوصول ")</script>';
                    $location ="index.php";
                    redirect($location);
                    
                    }  
                     include ("include/footer.php");
                } else {
                header('location: main-login.php');
                exit();
            }
        ob_end_flush();
   ?>


