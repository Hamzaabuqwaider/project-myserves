<?php 
$titlePage = "Contact";
include ("include/header-admin.php");
// include ("include/navadmin.php");
include("../include/session.php");
include("../include/connect.php");
include ("../include/function.php");

if(isset($_SESSION['admin'])){

    $do = isset($_GET['do']) ? $_GET['do'] : "Manage";

if($do == 'Manage'){

    include ("include/navadmin.php");

    $stmt = $con->prepare('SELECT * FROM notes');
    $stmt->execute();
    $row = $stmt->fetchAll();

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
                 <h3>البريد الوارد</h3> 
                  <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="cardsd-content">
                  <table>
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>البريد ألالكتروني</th>
                              <th>الرسالة</th>
                              <th>تاريخ الرسالة</th>
                              <th>حذف الرسالة</th>
                          </tr>
                      </thead>
                      
                      <tbody>
                      <?php foreach($row as $contact) { ?>
                          <tr>
                              <td><?php echo $contact['id']?></td>
                              <td><?php echo $contact['Email']?></td>
                              <td><?php echo $contact['Message']?> </td>
                              <td><?php echo $contact['Date']?></td>
                              <td>
                             <a href="contact.php?do=Delete&Messag_ID=<?php echo $contact['id'] ?>"><button type="button" class="btn btn-danger"> <i class="far fa-trash-alt"></i> حذف الرسالة</button></a>
                              </td>
                          </tr>
                          <!--test-->
                          <tr>
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

<?php }elseif($do == 'Delete'){ 

    $Messag_ID = isset($_GET['Messag_ID']) && is_numeric($_GET['Messag_ID']) ? intval($_GET['Messag_ID']) : 0 ;

        $stmt = $con->prepare("DELETE FROM notes  WHERE id = :zuser");

        $stmt->bindParam(":zuser",$Messag_ID);

        $stmt->execute();

        $Location = "contact.php?do=Manage";

        redirectHome($Location);

  } 
include ("include/footer-admin.php");
}else {
    header('Location: index.php');
    exit();
}

?>
