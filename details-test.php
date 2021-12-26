<?php 
$titlePage = "details";
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include ("include/function.php");
include('include/loding.php');

if (isset($_SESSION['userid'])) {

  $ID = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) :0;

  $getUser = $con->prepare("SELECT *,post.id as post_id, users.first_name,users.id as user , users.last_name , users.Response_speed FROM post INNER JOIN users ON users.id  = post.user_id WHERE post.id='$ID'");
  $getUser->execute();
  $row = $getUser->fetch();

  $SESSION = $_SESSION['userid'];
  $img_users = $con->prepare("SELECT * FROM users WHERE id = '$SESSION'");
  $img_users->execute();
  $img = $img_users->fetch();

?>
<div class="container">
<section class="panel-details">
      <div class="row">
          <div class="col-md-6">
              <div class="pro-img-details">
                  <img src="../project-myserves/layot/img/<?php echo $row['img'] ?>" alt="">
              </div>
          </div>
          <div class="col-md-6">
              <h4 class="pro-d-title">
                  <h1><?php echo $row['title'] ?></h1>
                  <h5><?php echo $row['first_name'] ."  ". $row['last_name']; ?></h5>
              </h4>
              <p>
                  <?php echo $row['body'] ?>
              </p>
              <div id="buttons-details">
                <a href="request.php?post_name=<?php echo $row['title'];?>&user_id=<?php echo $row['user']?>&post_id=<?php echo $row['post_id'];?>" class="btn-details-new blue-details"><i class="fas fa-plus"></i> طلب ألخدمة</a>
                <a href="chat.php?user_id=<?php echo $_SESSION['username'];?>&post=<?php echo $row['user_id'] ?>" class="btn-details-new orange-details"><i class="far fa-envelope"></i> ألتواصل مع البائع</a>
             </div>
      </div>
  </section>
  </div>
  <!--comment-->
  <div class="p-3 text-center">
    <h6 style="font-size:30px;">ألتعليقات</h6>
</div>
<div class="col-lg-12">
<div class="back-ground-comment-part-tow">
    <form method="POST">
    <div class="form-group">
    <img src="../project-myserves/layot/img/<?php echo $img['imgg'] ?>" width="50" height="50" class="rounded-circle ">
        <textarea class="form-control comment-texrarea" id="exampleFormControlTextarea1" rows="2" placeholder="اكتب تعليقك..."></textarea><button data-postid="<?= $_GET['id'] ?>" type="submit" class=" btn-textarea btn-comment"><i class="fas fa-location-arrow"></i></button>
    </div>
    </form>
</div>
</div>
    <div class="col-lg-12 comment_line"style="margin-bottom: 35px;" >

    </div>
  
  <!--comment-->

  <?php 
   include ("include/footer.php");
        }
        ?>
