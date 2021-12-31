<?php 
$titlePage = "details";
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include ("include/function.php");
// include('include/loding.php');

if (isset($_SESSION['userid'])) {

  $ID = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) :0;

  $getUser = $con->prepare("SELECT *,post.id as post_id, users.first_name,users.id as user , users.last_name , users.Response_speed FROM post INNER JOIN users ON users.id  = post.user_id WHERE post.id='$ID'");
  $getUser->execute();
  $row = $getUser->fetch();

  $SESSION = $_SESSION['userid'];
  $img_users = $con->prepare("SELECT * FROM users WHERE id = '$SESSION'");
  $img_users->execute();
  $img = $img_users->fetch();

  $stmt2 = $con->prepare("SELECT * FROM rating WHERE post_id = ? AND user_id = ?");
  $stmt2->execute([$ID, $_SESSION['userid']]);
  $rating = $stmt2->fetch();

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
             <?php
              $stmt2 = $con->prepare("SELECT * FROM rating WHERE post_id = ?");
              $stmt2->execute([$ID]);
              $ratings = $stmt2->fetchAll();
              $sumRating = 0;
              foreach($ratings as $rating) {
                  $sumRating += $rating['number_rating'];
              }
              $numberpeople = count($ratings);
              $avarage = $numberpeople != 0 ?  floor($sumRating / count($ratings)) : $sumRating;
             ?>
            <div class="rating-details">
               <div class="rating "><!--
                --><a href="details-test.php?id=<?= $ID ?>" class="<?= $avarage == 5 ? "select" : "" ?>" title="Give 5 stars">★</a><!--
                --><a href="details-test.php?id=<?= $ID ?>" class="<?= $avarage == 4 ? "select" : "" ?>" title="Give 4 stars">★</a><!--
                --><a href="details-test.php?id=<?= $ID ?>" class="<?= $avarage == 3 ? "select" : "" ?>" title="Give 3 stars">★</a><!--
                --><a href="details-test.php?id=<?= $ID ?>" class="<?= $avarage == 2 ? "select" : "" ?>" title="Give 2 stars">★</a><!--
                --><a href="details-test.php?id=<?= $ID ?>" class="<?= $avarage == 1 ? "select" : "" ?>" title="Give 1 star">★</a>
                </div>
            </div> 
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
  <?php if(isset($_SESSION['userid']) && $img['type'] == "2"): ?>
                <div id="<?= $ID ?>" class="rating rating2 go-rating"><!--
                     --><span class="what-rating">  ما هو تقييمك لهذه الخدمة ؟</span> <!--   
                    --><a id="5" class="ratingJS <?= $rating['number_rating'] == 5 ? "select" : "" ?>"  title="Give 5 stars">★</a><!--
                    --><a id="4" class="ratingJS <?= $rating['number_rating'] == 4 ? "select" : "" ?>" ij title="Give 4 stars">★</a><!--
                    --><a id="3" class="ratingJS <?= $rating['number_rating'] == 3 ? "select" : "" ?>" ij title="Give 3 stars">★</a><!--
                    --><a id="2" class="ratingJS <?= $rating['number_rating'] == 2 ? "select" : "" ?>" ij title="Give 2 stars">★</a><!--
                    --><a id="1" class="ratingJS <?= $rating['number_rating'] == 1 ? "select" : "" ?>" ij title="Give 1 stars">★</a>
                    <p dir="ltr" class="rating-text"></p>
                </div>
                <?php endif; ?>
  <!--comment-->
  <div class=" text-center">
    <h6 style="font-size:30px;margin-top: 50px; padding-top:200px;">ألتعليقات</h6>
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