<?php
$titlePage = "khadmatuk";
ob_start();
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include ("include/function.php");
 include('include/loding.php');

if(isset($_SESSION["userid"])) {

  $do = isset($_GET['do']) ? $_GET['do'] : "Manage";

  if($do == 'Manage'){

    $pageTitle = 'khadmatuk';
  
    $userid = $_GET['userid'];

    $stmt = $con->prepare("SELECT * FROM post WHERE user_id = '$userid'");
    
    $stmt ->execute();

    $row = $stmt->fetchAll();

?>

  <div class="cart-page ">
    <table class="table-cart" >
        
        <tr class="th-cart">
            <th style="text-align: right;" class="padding-deeto">الخدمه</th>
            <th>عرض الخدمه</th>
            <th >تعديل الخدمة</th>
            <th>حذف الخدمه</th>
        </tr>
        <?php foreach($row as $row1){ ?>
        <tr>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
          </tr>
        <tr class="td-cart">
            <td >
                <div class="cart-info">
                    <img class="imge-cart"  src="../project-myserves/layot/img/<?php echo $row1['img'] ?>" alt="">
                    <div>
                        <p style="font-weight:800;font-size:20px;margin-top:25px;"><?php echo $row1['title'] ?></p>
                    </div>
                </div>
            </td>
            <td ><a href="detailsservice.php?id=<?= $row1['id']?>"><i class="fas fa-eye color-icon-cart-tow"></i></a></td>
            <td ><a href="khadmatuk.php?do=Edit&Edit_id=<?php echo $row1['id'] ?>"><i class="fas fa-tools color-icon-cart"></i></a></td>
            <td ><a href="khadmatuk.php?do=Delete&post_id=<?php echo $row1['id'] ?>"><i class="fa fa-trash  color-icon-cart"></i></a></td>
          </tr>
          <tr>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
          </tr>
          <?php } ?>
    </table>
</div>
<?php

  }elseif($do == 'Edit'){

    $Edit_id = isset($_GET['Edit_id']) && is_numeric($_GET['Edit_id']) ? intval($_GET['Edit_id']) : 0 ;

    $stmt = $con->prepare('SELECT * FROM post WHERE id = ? LIMIT 1 ');

    $stmt->execute(array($Edit_id));

    $row = $stmt->fetch();
    
    $count =$stmt->rowCount();

    if($count > 0){ ?>

          <h1 class="name-section">تعديل خدمة</h1>
            <div class="container">
                <div class="add-serves-container">
                <form action="?do=Update&Edit_id2=<?php echo $Edit_id ?>" method="POST" enctype = "multipart/form-data">
                    <div class="form-group">
                            <label for="formGroupExampleInput">اسم الخدمة:</label>
                            <input type="text" name="name" class="form-control" value = "<?php echo $row["title"] ?>" id="formGroupExampleInput" placeholder="اسم الخدمة">
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
                    <button type="submit" class="btn btn-add-serves" style="border-radius:30px">&nbsp;تعديل الخدمة</button>
                </form>
                </div>
            </div>

    <?php
    } else {

        echo "<div class='alert alert-danger' role='alert'>There is no such ID </div>";
    }

  }elseif($do == 'Update'){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){


      $Edit_id2 = $_GET["Edit_id2"];

    $name        = $_POST['name'];
    $Body        = $_POST['body'];
    $imageName   = $_FILES['upload']['name'];
    $imageSize   = $_FILES['upload']['size'];
    $imageTemp   = $_FILES['upload']['tmp_name'];
    $imageType   = $_FILES['upload']['type'];
    $imageAllowedExtentions = array("jpeg" , "jpg", "png" , "gif");
    $imageExtension = strtolower(end(explode('.' , $imageName)));
    $formErrors = array();
    if(empty($name)) {
        $formErrors[] = 'name cant be <strong>Empty</strong>';
    }

    if(empty($Body)) {
        $formErrors[] = 'Body cant be <strong>Empty</strong>';
    }

    if(!empty($imageName) && ! in_array($imageExtension,$imageAllowedExtentions)){
        $formErrors[] = 'This Extension is Not<strong>Allowed</strong>';
    }

    if(empty($imageName)) {
        $formErrors[] = 'Image IS <strong>Required</strong>';
    }

    foreach($formErrors as $erros){
        echo '<div class="alert alert-danger">' . $erros . '</div>';
    }
    if(empty($formErrors)){
      $image = rand(0 , 100000) . '_' . $imageName;
      move_uploaded_file($imageTemp,'layot/img/' .$image);
  // Insert Userinformation In The Database
  $stmt = $con->prepare("UPDATE post SET 
                                        title=?,
                                        body=?,
                                        img=?
                                        WHERE id ='".$Edit_id2."'");
  $stmt->execute(array(
                      $name,
                      $Body,
                      $image,
));

      $sesstion = $_SESSION['userid'];

      $Location = "khadmatuk.php?do=Manage&userid= $sesstion";
          
      redirectHome($Location);

      }else {
         echo "No Record Added";
      } 
  }

  }elseif($do == 'Delete'){

    // include ("include/function.php");
    
    $post_id = isset($_GET['post_id']) && is_numeric($_GET['post_id']) ? intval($_GET['post_id']) : 0 ;
    
    $stmt = $con->prepare("DELETE FROM post  WHERE id = '$post_id' ");
    
    $stmt->execute();
    
    $theMsg = "<div>" . $stmt->rowCount() . ' Record Deleted</div>';

    $sesstion = $_SESSION['userid'];
    
    $Location = "khadmatuk.php?do=Manage&userid= $sesstion";
    
    redirectHome($Location);
    
    }
}
include ("include/footer.php");?>