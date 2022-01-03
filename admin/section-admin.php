<?php 
  session_start();
  ob_start();
  $titlePage = "admin-section";
  include ("include/header-admin.php");
  include ("../include/connect.php");
  include ("../include/function.php");

  if(isset($_SESSION['admin'])){

    $do = isset($_GET['do']) ? $_GET['do'] : "Manage";

    if($do == 'Manage'){

      include ("include/navadmin.php");

      $stmt1 = $con->prepare("SELECT * FROM main_categories");
      $stmt1 ->execute();
      $row1 = $stmt1->fetchAll();

   
?>

<!--start section-->
<div class="wrapper">
  <div class="container">
    <div class="tables-admin">
      
       <!--start taple-->
       <div class="row">
      <div class="col-12">
          <div class="cardsd-taple-page overlay-scrollbar">
              <div class="cardsd-header">
                 <h3>الأقسام الرئيسة</h3> 
                  <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="cardsd-content">
                  <table>
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>اسم القسم</th>
                              <th>نوع القسم</th>
                              <th>تاريخ اضافة القسم</th>
                              <th>حذف القسم</th>
                              <th>الاقسام الفرعية</th>
                              <th>عرض على الشاشة الرئيسية</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach($row1 as $row) { ?>
                          <tr>
                              <td><?php echo $row["id"] ?></td>
                              <td><?php echo $row["title_cat"] ?></td>
                              <td><?php echo $row["type"] ?></td>
                              <td><?php echo $row["Date_create"] ?></td>
                              <td>
                                <a href="section-admin.php?do=Delete&main_c=<?php echo $row["id"] ?>"><button type="button" onclick="return confirm('هل أنت متأكد من حذف هذا القسم ؟ سيتم حذف القسم وبما يحتويه من اقسام فرعيه !')" class="btn btn-danger">حذف القسم</button></a>
                              </td>
                              <td>
                                 <a href="sectionsub.php?do=Manage&sub_id=<?php echo $row["id"] ?>"><button type="button" style="background-color: #d39e00; color:white" class="btn ">الاقسام الفرعية</button></a>
                              </td>
                              <td>
                              <?php if ($row['RegStatus'] == 0) {
                                    echo "<a href='section-admin.php?do=Activate&main_ID=" . $row['id'] . "' class='btn btn-Success '><i class='far fa-eye'></i> عـرض </a>";
                                   }else{
                                    echo "<a href='section-admin.php?do=Act&main_ID=" . $row['id'] . "' class='btn btn-Danger '><i class='far fa-eye-slash'></i> إخفـاء </a>";
                                   } ?>
                              </td>
                          </tr>
                          <?php } ?>
                          <!--test-->
                          <!--test-->
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
       <!--end taple-->
       <!--start add section-->ِِ
       <div class="row">
      <div class="col-6">
          <div class="cardsd-taple-page add-section-admin">
              <div class="cardsd-header">
                 <h3>اضافة قسم</h3> 
                  <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="cardsd-content">
                  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="form-group">
                        <label for="formGroupExampleInput">اسم القسم</label>
                        <input type="text" name="name_main" class="form-control" id="formGroupExampleInput" placeholder="اسم القسم">
                        <label>نوع القسم</label>
                        <select class="form-control" name = "rol">
                           <option selected value = "S" >خدمات</option>
                           <option value = "F">عمل حر</option>
                        </select>
                    </div>
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
                      <button type="submit " name = "ins"  class="btn btn-success mb-2 btn-section">اضافة القسم</button>
                  </form>
              </div>
          </div>
      </div>
     <?php if(isset($_POST["ins"])){

            $name_main = $_POST["name_main"];

            $rol = $_POST["rol"];

            $imageName   = $_FILES['upload']['name'];
            $imageSize   = $_FILES['upload']['size'];
            $imageTemp   = $_FILES['upload']['tmp_name'];
            $imageType   = $_FILES['upload']['type'];
            $imageAllowedExtentions = array("jpeg" , "jpg", "png" , "gif");
            $imageExtension = strtolower(end(explode('.' , $imageName)));
            
            $image = rand(0 , 100000) . '_' . $imageName;
            move_uploaded_file($imageTemp,"layot/img/$image");
            $insert = $con->prepare("INSERT INTO main_categories (title_cat,type,img) VALUES(:zname , :ztype ,:zimg)");
            $insert->execute(array(
                'zname' => $name_main,
                'ztype' => $rol,
                'zimg'  => $image
            ));
            $Location = "section-admin.php?do=Manage";

            redirectHome($Location);

        }
?>
       <!--end add section-->
    </div>
  </div>
</div>
<?php

    } elseif($do == 'Delete'){

      $main_c = isset($_GET['main_c']) && is_numeric($_GET['main_c']) ? intval($_GET['main_c']) : 0 ;

      $check = checkItem('id', "main_categories", $main_c);

      // If There's Such ID Show The Form
      
      if($check > 0){ 
      
          $stmt = $con->prepare("DELETE FROM main_categories  WHERE id = :zmainc");

          $stmt->bindParam(":zmainc",$main_c);

          $stmt->execute();

          echo "<script>alert('تم حذف القسم');</script>";
          $Location = "section-admin.php";

          redirectHome($Location,0);
  
      } else {

          $Location = "section-admin.php";


          redirectHome($Location);

      }
    }elseif ($do == "Activate") {

        $main_ID = isset($_GET['main_ID']) && is_numeric($_GET['main_ID']) ? intval($_GET['main_ID']) : 0 ;
        
        
        
            $stmt = $con->prepare("UPDATE main_categories SET RegStatus = 1 WHERE id = ?");

            $stmt->execute(array($main_ID));

            $Location = "section-admin.php";

            redirectHome($Location);
    
        

    echo "</div>";

    }elseif ($do == "Act") {

        $main_ID = isset($_GET['main_ID']) && is_numeric($_GET['main_ID']) ? intval($_GET['main_ID']) : 0 ;
            
        
            $stmt = $con->prepare("UPDATE main_categories SET RegStatus = 0 WHERE id = ?");

            $stmt->execute(array($main_ID));

            $Location = "section-admin.php";

            redirectHome($Location);
    
        

    echo "</div>";

    }
}
ob_end_flush();
?>

<!--end wraper-->
<!--end section-->
<?php include ("include/footer-admin.php");?>
<script>
    var btnUpload = $("#uploadss_file"),
btnOuter = $(".button_outer");
btnUpload.on("change", function(e){
var ext = btnUpload.val().split('.').pop().toLowerCase();
if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
    $(".error_msg").text("Not an Image...");
} else {
    $(".error_msg").text("");
    btnOuter.addClass("file_uploading");
    setTimeout(function(){
        btnOuter.addClass("file_uploaded");
    },3000);
    var uploadedFile = URL.createObjectURL(e.target.files[0]);
    setTimeout(function(){
        $("#uploaded_view").append('<img  src="'+uploadedFile+'" />').addClass("show");
    },3500);
}
});
$(".file_remove").on("click", function(e){
$("#uploaded_view").removeClass("show");
$("#uploaded_view").find("img").remove();
btnOuter.removeClass("file_uploading");
btnOuter.removeClass("file_uploaded");
});
</script>



