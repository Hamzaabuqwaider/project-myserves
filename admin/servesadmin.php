<?php 
   $titlePage = "servesadmin";
   include ("include/session.php");
   include ("include/connect.php");
   include ("include/header-admin.php");
   include ("include/function.php");

   if(isset($_SESSION['admin'])){

    $do = isset($_GET['do']) ? $_GET['do'] : "Manage";

    if($do == 'Manage'){

        include ("include/navadmin.php");

   $stmt1 = $con->prepare("SELECT * ,post.RegStatus as Reg
                                    ,post.date as add_data,
                                     post.id as ID,
                                     sub_category.Name as Name,
                                     main_categories.title_cat as NAME_MAIN,
                                     main_categories.type as TYPE_MAIN
                                     FROM post
   INNER JOIN sub_category ON sub_category.id = post.category_id
   INNER JOIN users ON users.id  = post.user_id
   INNER JOIN main_categories ON main_categories.id = sub_category.parent_id
    ");
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
                 <h3> الإعلانات في الموقع</h3> 
                  <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="cardsd-content">
                  <table>
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>اسم الخدمة</th>
                              <th>نوع القسم</th>
                              <th>القسم الرئيسي</th>
                              <th>القسم الفرعي</th>
                              <th>عدد الطلبات</th>
                              <th>تاريخ اضافة الخدمة</th>
                              <th>التعليقات</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php foreach($row1 as $post){ ?>
                          <tr>
                              <td><?php echo $post["ID"] ?></td>
                              <td><?php echo $post["title"] ?></td>
                              <td><?php echo $post["TYPE_MAIN"] ?></td>
                              <td><?php echo $post["NAME_MAIN"] ?></td>
                              <td><?php echo $post["Name"] ?></td>
                              <td>--------</td>
                              <td><?php echo $post["add_data"] ?></td>
                              <td>
                                 <a href="comment.php?do=Manage&comment_id=<?php echo $post["ID"] ?>"><button type="button" class="btn btn-success"><i class="far fa-comment-alt"></i> رؤية التعليقات</button></a>
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
    </div>
  </div>
</div> <!--end wraper-->

<!--end section-->

<?php     }elseif ($do == "Activate") {

        // Check if Get Request userID is Numeric & Get The Integer Value of It

        $post_ID = isset($_GET['post_ID']) && is_numeric($_GET['post_ID']) ? intval($_GET['post_ID']) : 0 ;
            
        
            $stmt = $con->prepare("UPDATE post SET RegStatus = 1 WHERE id = ?");

            $stmt->execute(array($post_ID));

            $Location = "servesadmin.php?do=Manage";

            redirectHome($Location);
    }
    
    include ("include/footer-admin.php");
} else {

    header('Location: index.php');
    
    exit();
}
?>