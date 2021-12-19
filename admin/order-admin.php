<?php 
   $titlePage = "servesadmin";
   session_start();
   include ("include/header-admin.php");
   include ("../include/connect.php");
   include ("../include/function.php");

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
                 <h3>الخدمات في الموقع</h3> 
                  <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="cardsd-content">
                  <table>
                      <thead>
                          <tr>
                              <th>#</th>
                              <th> اسم الخدمة</th>
                              <th>نوع القسم</th>
                              <th>القسم الرئيسي</th>
                              <th>القسم الفرعي</th>
                              <th>التاريخ</th>
                              <th>وصف الخدمة</th>
                              <th>القبول</th>
                              <th>الرفض</th>
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
                              <td><?php echo $post["add_data"] ?></td>
                              <td>
                                  <!-- وصف الخدمة -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $post["ID"] ?>">
                                    وصف الخدمة
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $post["ID"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">وصــف الخـدمـة</h5>
                                    </div>
                                    <div class="modal-body">
                                        <?= $post["body"] ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلــغاء</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                   <!-- وصف الخدمة -->
                              </td>
                              <td>
                              <?php if ($post['Reg'] == 0) {
                                    echo "<a href='order-admin.php?do=Activate&post_ID=" . $post["ID"] . "' class='btn btn-info activate'><i class='fa fa-check'></i> قبول الخدمة</a>";
                                   } ?>
                              </td>
                              <td>
                              <a href="order-admin.php?do=Delete&post_ID=<?php echo $post["ID"] ?>"><button type="button" class="btn btn-danger">رفض الخدمة</button></a>
                              </td>
                          </tr>
                          <!--test-->
                          <?php } ?>
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

<?php 

 }elseif ($do == "Activate") {

// Check if Get Request userID is Numeric & Get The Integer Value of It

$post_ID = isset($_GET['post_ID']) && is_numeric($_GET['post_ID']) ? intval($_GET['post_ID']) : 0 ;
    

    $stmt = $con->prepare("UPDATE post SET RegStatus = 1 WHERE id = ?");

    $stmt->execute(array($post_ID));

    $Location = "order-admin.php?do=Manage";

    redirectHome($Location);
}

include ("include/footer-admin.php");
} else {

    header('Location: index.php');

exit();
}

?>