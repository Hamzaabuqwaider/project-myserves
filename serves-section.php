<?php
ob_start();
    $titlePage = "service";
  include ("include/session.php");
  include ("include/connect.php");
  include ("include/header.php");
  include ("include/topnav.php");
  include('include/loding.php');
  if(isset($_SESSION['userid'])) {
?>

<?php
$row_category=array();
$free1 ="SELECT * from main_categories WHERE main_categories.type='S'";
$run_free = $con->query($free1);
while($row_free = $run_free->fetch())
{
  $categoryid = $row_free['id'];
  $category_title = $row_free['title_cat'];
  $sub_cat ="SELECT * from sub_category WHERE sub_category.parent_id='$categoryid'";
  $run_sub = $con->query($sub_cat);
  $row = $run_sub->rowCount();
  if($row >0 )
  {
    $row_subs1=[];
    while($row_subs=$run_sub->fetch()){
      $sub_id = $row_subs['id'];
      $sub_title = $row_subs['Name'];
      array_push($row_subs1,['Sub ID'=> $sub_id,'Sub Title'=> $sub_title]);

    }

  }else{
    $row_subs1=[];

  }

  array_push($row_category,['Category ID'=> $categoryid, 'Category Title'=> $category_title,'Sub Items'=> $row_subs1]);
}

?>

<h1 class="name-section">قسم الخدمات</h1>

<!--start section-->
<div class="container">
    <div class="row">
    <?php foreach($row_category as $category){ ?>
        <div class="col-md-4">
            <div class="container-section-freelance">
              <a href="#" class="section-title"><?php echo $category['Category Title']?></a>
              <hr>
              <ul>

                <?php foreach($category['Sub Items'] as $sub): ?>
                 <li><a href="section.php?Cat_id=<?= $sub['Sub ID'] ?>">
                   <?= $sub['Sub Title'] ?> </a></li>
                 <?php endforeach; ?>
              </ul>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!--start section-->

<?php include ("include/footer.php"); } else {
  header("Location: main-login.php");
}?>