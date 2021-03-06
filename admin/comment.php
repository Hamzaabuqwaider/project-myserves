<?php 
   $titlePage = "comment";
   include ("include/session.php");
   include ("include/connect.php");
   include ("include/header-admin.php");
   include ("include/function.php");

  if(isset($_SESSION['admin'])){


   $do = isset($_GET['do']) ? $_GET['do'] : "Manage";

   $comment = $_GET["comment_id"];

   if($do == 'Manage'){

   include ("include/navadmin.php");

   $stmt = $con->prepare("SELECT * , comment.comment_id as ID
   FROM comment
   INNER JOIN users ON users.id  = comment.comment_user WHERE post_id = '$comment' ");

   $stmt->execute();

   $comments = $stmt->fetchAll();

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
                 <h3>التعليقات</h3> 
                  <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="cardsd-content">
                  <table>
                      <thead>
                          <tr>
                              <th>#</th>
                              <th> اسم صاحب التعليق</th>
                              <th>التعليقات</th>
                              <th>حذف التعليق</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php foreach($comments as $comm){ ?>
                          <tr>
                              <td><?php echo $comm["ID"] ?></td>
                              <td><?php echo $comm["first_name"] . ' ' . $comm['last_name'] ?></td>
                              <td><?php echo $comm["comment"] ?></td>
                              <td>
                                <a href="comment.php?do=Delete&comment_id=<?php echo $comm["ID"] ?>"><button type="submit" onclick="return confirm('هل أنت متأكد بحذف هذا التعليق ؟')" name ="delete" class="btn btn-danger">حذف التعليق</button></a>
                              </td>
                          </tr>
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
      }elseif($do == 'Delete'){ // Delete Member Page 

        $comment = isset($_GET['comment_id']) && is_numeric($_GET['comment_id']) ? intval($_GET['comment_id']) : 0 ;
                
        //Select All Data Depend On This ID

        $check = checkItem('comment_id', "comment", $comment);

            if($check > 0){ 

            $stmt = $con->prepare("DELETE FROM comment Where comment_id = :zcomment ");

            $stmt->bindParam(":zcomment",$comment);

            $stmt->execute();
            $Location = "servesadmin.php?do=Manage";
            redirectHome($Location);

            } else {

                $Location = "comment.php?do=Manage";

                redirectHome($Location);

            }
      }
      include ("include/footer-admin.php"); 
      
    } else {

        header('Location: index.php');
        exit();
}


?>



