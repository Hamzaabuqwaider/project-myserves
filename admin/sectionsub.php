<?php 
  ob_start();
  $titlePage = "sub-section";
  include ("include/session.php");
  include ("include/connect.php");
  include ("include/header-admin.php");
  include ("include/function.php");

  if(isset($_SESSION['admin'])){

    $do = isset($_GET['do']) ? $_GET['do'] : "Manage";
   
    $sub = $_GET["sub_id"];

    if($do == 'Manage'){

            

      include ("include/navadmin.php");

      $stmt1 = $con->prepare("SELECT *,sub_category.id as SUB_C,main_categories.title_cat as Title,main_categories.id as ID_C FROM sub_category
      INNER JOIN main_categories ON main_categories.id = sub_category.parent_id
      WHERE parent_id = $sub ");
      $stmt1 ->execute();
      $row1 = $stmt1->fetchAll();

?>
<!--start section-->
<div class="wrapper">
  <div class="container">
    <div class="section-sub-admin">
       <!--start taple-->
       <div class="row">
      <div class="col-12">
          <div class="cardsd-taple-page  overlay-scrollbar">
              <div class="cardsd-header">
                 <h3>القسم الفرعي</h3> 
                  <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="cardsd-content">
                  <table>
                      <thead>
                          <tr>
                              <th>#</th>
                              <th> اسم القسم الفرعي</th>
                              <th>اسم القسم الرئيسي</th>
                              <th>تاريخ اضافة القسم</th>
                              <th>حذف القسم</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php foreach($row1 as $row) { ?>
                          <tr>
                              <td><?php echo $row["SUB_C"] ?></td>
                              <td><?php echo $row["Name"] ?></td>
                              <td><?php echo $row["Title"] ?></td>
                              <td><?php echo $row["created_at"] ?></td>
                              <td>
                                <a href="sectionsub.php?do=Delete&sub_c=<?php echo $row["SUB_C"] ?>&sub_id=<?=$_GET['sub_id']?>"><button type="button" onclick="return confirm('هل انت متأكد من حذف القسم الفرعي ؟')" class="btn btn-danger">حذف القسم</button></a>
                              </td>
                          </tr>
                          <?php } ?>
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
                 <h3>اضافة قسم فرعي</h3> 
                  <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="cardsd-content">
                    <form action="" method="post"> 
                    <div class="form-group">
                        <label for="formGroupExampleInput">اسم القسم</label>
                        <input type="text" name="name_sub" class="form-control" id="formGroupExampleInput" placeholder="اسم القسم">
                    </div>
                      <button type="submit" name = "ins" class="btn btn-success mb-2">اضافة القسم</button>
                    </form>
              </div>
          </div>
      </div>
      <?php 
     
      if(isset($_POST["ins"])){

        $name_sub = $_POST["name_sub"];

        $insert = $con->prepare("INSERT INTO sub_category (Name,parent_id) VALUES(:zname ,:ztype)");

        $insert->execute(array(
            'zname' => $name_sub,
            'ztype' => $sub
        ));
        $Location = "sectionsub.php?do=Manage&sub_id=$sub";

        redirectHome($Location);

        }
?>
       <!--end add section-->
    </div>
  </div>
</div> <!--end wraper-->
<?php

    }elseif($do == 'Delete'){

      $sub_c = isset($_GET['sub_c']) && is_numeric($_GET['sub_c']) ? intval($_GET['sub_c']) : 0 ;

      $check = checkItem('id', "sub_category", $sub_c);

      // If There's Such ID Show The Form
      
      if($check > 0){ 
      
          $stmt = $con->prepare("DELETE FROM sub_category  WHERE id = :zsub_c");

          $stmt->bindParam(":zsub_c",$sub_c);

          $stmt->execute();
          $Location = "sectionsub.php?do=Manage&sub_id=$sub";

          redirectHome($Location);

  
      } else {

          $Location = "section-admin.php?do=Manage";

          redirectHome($Location);

      }
    }
}
ob_end_flush();
?>
<!--end wraper-->

<!--end section-->

<?php include ("include/footer-admin.php");?>