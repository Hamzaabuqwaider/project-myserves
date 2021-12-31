<?php
$titlePage = "order";
ob_start();
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include ("include/function.php");
// include('include/loding.php');

// include("include/loding.php");

if(isset($_SESSION["userid"]))
{

  $do = isset($_GET['do']) ? $_GET['do'] : "Manage";

  if($do == 'Manage'){

$pageTitle = 'Orders';
  
$r =$_SESSION['userid'];



  $stmt1 = $con->prepare("SELECT *,orders.id as  order_id,orders.price as price, post.img as IMG,post.title as TITLE,post.body as BODY  FROM orders
  INNER JOIN post ON post.id  = orders.post_id
  INNER JOIN users ON users.id  = orders.to_id WHERE orders.from_id = '$r' ");
  $stmt1 ->execute();
  $row1 = $stmt1->fetchAll();

 //$action = isset($_GET['action']) ? $_GET['action'] : '0';
  //$order_id = isset($_GET['order_id']) && is_numeric($_GET['order_id']) ? intval($_GET['order_id']) :0
 
  ?>
   <h1 class="name-section">الخدمات المطلوبة</h1>
  <div class="cart-page ">
    <table class="table-cart" >
        
        <tr class="th-cart">
            <th style="text-align: right;" class="padding-deeto">الخدمه</th>
            <th >السعر</th>
            <th>عرض الخدمه</th>
            <th>حذف الخدمه</th>
        </tr>
        <?php foreach($row1 as $row){ ?>
        <tr>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
          </tr>
        <tr class="td-cart">
            <td >
                <div class="cart-info">
                    <img class="imge-cart"  src="../project-myserves/layot/img/<?php echo $row['IMG'] ?>" alt="">
                    <div>
                        <p style="font-weight:800;font-size:20px"><?php echo $row["TITLE"] ?></p>
                        <small style="font-weight:800 ;font-size:15px"><?php echo $row['first_name'] . " " . $row['last_name'] ?></small>
                        <br>
                    </div>
                </div>
            </td>
            <td class="th-deef" style="font-weight:800"><?php echo $row['price'] ?></td>
            <td ><a href="details-test.php?id=<?= $row['post_id']?>"><i class="fas fa-eye color-icon-cart-tow"></i></a></td>
            <td ><a href="order.php?do=Delete&id=<?php echo $row['order_id'] ?>"><i class="fa fa-trash  color-icon-cart"></i></a></td>
          </tr>
          <tr>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
          </tr>
          <?php } ?>
    </table>
</div>
<?php }elseif($do == 'Delete'){

// include ("include/function.php");

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;

$stmt = $con->prepare("DELETE FROM orders  WHERE id = '$id' ");

$stmt->execute();

            echo '<script>alert("تم حذف الطلب")</script>';
            $location ="index.php";
            redirect($location);

}

 include ("include/footer.php");
}else
{
    header("Location: main-login.php");
}
?>