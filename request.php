<?php
$titlePage = "request";
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include ("include/function.php");
include("include/loding.php");

if(isset($_SESSION["userid"]))
{
  $From = $_SESSION["userid"];
  $to = (int)$_GET["user_id"];
  $post_name = $_GET["post_name"];
  $post_id = (int)$_GET["post_id"];

  $post = $con->prepare("SELECT *,post.id as post_id, users.first_name,users.id as user , users.last_name , users.Response_speed FROM post INNER JOIN users ON users.id  = post.user_id WHERE post.id='$post_id'");
  $post->execute();
  $row = $post->fetch();



    if(isset($_POST['save'])){
  
        $price = $_POST["price"];


       $Stmt = $con->prepare("INSERT INTO orders SET to_id = ? , from_id = ?, post_name = ?, post_id =?,price=?");
        $Stmt->execute([
            $to,
            $From,
            $post_name,
            $post_id,
            $price
 ]);
}
?>

<div id="wrapper">
  <div id="container">
    

    <div id="info">
       <div class="color-overlay-add-cart"></div>
      <img id="product" src="../project-myserves/layot/img/<?php echo $row['img'] ?>"/>
      <a href="details-test.php?id=<?= $row['post_id']?>" class="go-back-card"><i class="fas fa-arrow-circle-right"></i></a>
      <p><?php echo $row['title'];?> </p>
      <p style="top:50%;font-size:20px;"><?php echo $row['first_name'] ."  ". $row['last_name']; ?></p>
    </div>

    <div id="payment">

      <form id="checkout" method="POST">
          <div id="icon-card">
               <i class="fab fa-cc-visa" style="color:darkslateblue;"></i>
               <i class="fab fa-cc-paypal" style="color:#284f78d9;"></i>   
               <i class="fab fa-cc-mastercard" style="color:#0000ff82;"></i>  
           </div>           
               <div class="group">      
                <input type="text" id="requst" value="$"  >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>أدخل المبلغ</label>
            </div>
            <div class="group d-none">      
                <input type="text" id="discount" value="$">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>ضريبة ألموقع (5%)</label>
            </div>
            <div class="group">      
                <input type="text" id="discount-tow" value="$" >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>قيمة الخصم للموقع (%5) </label>
            </div>
            <div class="group">      
                <input type="text" id="moyna" value="$" name="price">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label> ألناتج النهائي (بدينار)</label>
            </div>
            <a href="order.php"> <input class="btn btn-primary " type="submit" value="طلب الخدمة" name="save"></a>
      </form>
    </div>

  </div>
</div>


    <?php include ("include/footer.php");?>
<?php 
  }else {
  "not found";
}
?>

