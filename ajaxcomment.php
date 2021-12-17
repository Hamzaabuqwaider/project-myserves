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
?>
<div class="container">
<section class="panel">
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
                <a href="testing.php?post_name=<?php echo $row['title'];?>&user_id=<?php echo $row['user']?>&post_id=<?php echo $row['post_id'];?>" class="btn-details-new blue-details"><i class="fas fa-plus"></i> طلب ألخدمة</a>
                <a href="chat.php?user_id=<?php echo $_SESSION['username'];?>&post=<?php echo $row['user_id'] ?>" class="btn-details-new orange-details"><i class="far fa-envelope"></i> ألتواصل مع البائع</a>
             </div>
      </div>
  </section>
  </div>
  <!--comment-->
  <div class=" mt-5 mb-5">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="card card-comment-details">
                <div class="p-3">
                    <h6>ألتعليقات</h6>
                </div>
                <div class="mt-3 d-flex flex-row align-items-center p-3 form-color"> <img src="https://i.imgur.com/zQZSWrt.jpg" width="50" class="rounded-circle mr-2"> 
                    <input type="text" class="form-control" placeholder="اكتب تعليقك..."><button><i class="fas fa-location-arrow"></i></button> </div>
                <div class="mt-2">
                    <div class="d-flex flex-row p-3">
                         <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle mr-3">
                        <div class="w-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center"> <span class="mr-2">Brian selter</span>  </div> <small>12h ago</small>
                            </div>
                            <p class="text-justify comment-text mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                            <div class="d-flex flex-row user-feed"> <span class="wish"><span class="ml-3 replay-color"><i class="fas fa-reply mr-2"></i>رد</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!--comment-->

  <?php 
        } else {

            header('Location: main-login.php');
            exit();
        }
?>
<!--end-details-->
<?php include ("include/footer.php");?>

