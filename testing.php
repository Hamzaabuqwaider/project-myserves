<?php
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include ("include/function.php");
include("include/loding.php");
// $post_id = isset($_GET['post_id']) && is_numeric($_GET['post_id']) ? intval($_GET['post_id']) :0;

// $stmt = $con->prepare("SELECT *,users.name as Name FROM post 
//                       INNER JOIN users ON users.id = post.user_id WHERE post.id = $post_id ");
// $stmt->execute(array($post_id));
// $row = $stmt->fetchAll();
// var_dump($row);die();


if(isset($_SESSION["userid"]))
{
    if(isset($_POST['save'])){
        $From = $_SESSION["userid"];
        $to = (int)$_GET["user_id"];
        $post_name = $_GET["post_name"];
        $post_id = (int)$_GET["post_id"];
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
      <img id="product" src="layot/img/pexels-artem-podrez-8986145.jpg"/>
      <a href="detailsservice.php class="go-back-card"><i class="fas fa-arrow-circle-right"></i></a>
      <p><?php echo $row['title'];?> </p>
      <p style="top:50%;font-size:20px;"><?php echo $row['Name'];?></p>
    </div>

    <div id="payment">

      <form id="checkout" method="POST">
          <div id="icon-card">
               <i class="fab fa-cc-visa" style="color:darkslateblue;"></i>
               <i class="fab fa-cc-paypal" style="color:#284f78d9;"></i>   
               <i class="fab fa-cc-mastercard" style="color:#0000ff82;"></i>  
           </div>           
               <div class="group">      
                <input type="text" id="requst"  >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>أدخل المبلغ</label>
            </div>
            <div class="group d-none">      
                <input type="text" id="discount" value="5%">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>ضريبة ألموقع (5%)</label>
            </div>
            <div class="group">      
                <input type="text" id="discount-tow" >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>قيمة الخصم للموقع </label>
            </div>
            <div class="group">      
                <input type="text" id="moyna" value="$" name="price">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label> ألناتج النهائي (بدينار)</label>
            </div>
        <input class="btn" type="button" name="" value="طلب ألخدمة" name="save">
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
