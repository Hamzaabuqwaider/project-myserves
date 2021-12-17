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
<!--start-detalis-->
<div class="main-backgrond">
  <div class="radous">
    <div class="bacground-details text-center">
      <div class="row">
        <div class="col-xl-4  col-lg col-md-12">
          <div class="imge-details d-xl-none">
            <img  src="../project-myserves/layot/img/<?php echo $row['img'] ?>" alt="">
          </div>
        </div>
        <div class="col-xl-4  col-lg col-md-12">
          <div class="text-detais">
            <h3><?php echo $row['first_name'] ."  ". $row['last_name']; ?></h3>
            <i class="fas fa-briefcase"></i><span><?php echo $row['title'] ?> </span>
          </div>
        </div>
        <div class="col-xl-4  col-lg col-md col-xs">
          <div class="mar-btn-detals">
          <a href="chat.php?user_id=<?php echo $_SESSION['username'];?>&post=<?php echo $row['user_id'] ?> "><button type="button" class="btn  btn-details">تواصل مع البائع</button></a><span><a href="testing.php?post_name=<?php echo $row['title'];?>&user_id=<?php echo $row['user']?>&post_id=<?php echo $row['post_id'];?>"><button type="button" class="btn btn-secondary btn-details-tow"><i class="fas fa-shopping-cart icon-cart"></i><span>طلب الخدمة</span></button></a></span>
          </div>
          <div class="padding d-none d-xl-block">
          </div>
        </div>
      </div>
    </div>
    <div class="back-ground-par">
      <div class="imge-details-tow d-none d-xl-block">
        <img  src="../project-myserves/layot/img/pexels-pixabay-147413.jpg" alt="">
      </div>
      <div class="row">
        <div class="container">
          <div class="col-lg-12">
            <div class="mr-details text-center">
              <h1 class="h1-detals">تفاصيل الخدمه:</h1>
              <p class="prg-dtails">
                  <?php echo $row['body'] ?>
              </p>
            </div>
          </div>
          <hr class="hr-details">
          <div class="col-lg-12">
            <div class="back-ground-comment-part-tow">
              <form method="POST">
                <div class="form-group">
                  <label class="lable-details" for="exampleFormControlTextarea1"><span><i style="color:#e59560" class="fas fa-comment-alt "></i>&nbsp;</span>آراء المشترين</label>
                  <textarea class="form-control comment-texrarea" id="exampleFormControlTextarea1" rows="2"></textarea><span><button data-postid="<?= $_GET['id'] ?>" type="submit" class="btn btn-textarea btn-comment"> <span style="margin-left:5px"><i class="fas fa-comments"></i></span>تعليق</button>
                </div>
              </form>
            </div>
          </div>
              <div class="col-lg-12 comment_line" >

              </div>
          </div>      
      </div>
    </div>
  </div>

</div>
<?php 
        } else {

            header('Location: main-login.php');
            exit();
        }
?>
<!--end-details-->
<?php include ("include/footer.php");?>


