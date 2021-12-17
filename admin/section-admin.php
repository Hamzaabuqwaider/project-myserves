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
                                <a href="section-admin.php?do=Delete&main_c=<?php echo $row["id"] ?>"><button type="button" class="btn btn-danger">حذف القسم</button></a>
                              </td>
                              <td>
                                 <a href="sectionsub.php?do=Manage&sub_id=<?php echo $row["id"] ?>"><button type="button" class="btn btn-primary">الاقسام الفرعي</button></a>
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
       <!--start add section-->
       <div class="row">
      <div class="col-12">
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
                      <button type="submit" name = "ins"  class="btn btn-success mb-2">اضافة القسم</button>
                  </form>
              </div>
          </div>
      </div>
     <?php if(isset($_POST["ins"])){

            $name_main = $_POST["name_main"];

            $rol = $_POST["rol"];

            $insert = $con->prepare("INSERT INTO main_categories (title_cat,type) VALUES(:zname , :ztype)");
            $insert->execute(array(
                'zname' => $name_main,
                'ztype' => $rol
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
    }
}
ob_end_flush();
?>
<!--end wraper-->

<!--end section-->

<?php include ("include/footer-admin.php");?>