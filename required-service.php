<?php
ob_start();
$titlePage = "required-service";
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/function.php");
include ("include/topnav.php");
include('include/loding.php');

if(isset($_SESSION["userid"]))
{
$r =$_SESSION['userid'];
    $stmt1 = $con->prepare("SELECT *,orders.id as Order_ID,orders.price as price, post.img as IMG,post.title as TITLE,post.body as BODY FROM orders
     INNER JOIN post ON post.id  = orders.post_id
     INNER JOIN users ON users.id  = orders.from_id WHERE orders.to_id = '$r' ");
    $stmt1 ->execute();
    $row1 = $stmt1->fetchAll();

        ?>
<h1 class="name-section">الطلبات الواردة</h1>
<div class="cart-page">
<form action="" method="post">
    <table class="table-cart" >
        
        <tr class="th-cart">
            <th style="text-align: right;">الخدمه</th>
            <th >إلــغاء الطلب</th>
            <th> السعر</th>
            
           
        </tr>
        <?php foreach($row1 as $row){ ?>
            
        <tr>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
            
          </tr>
        <tr class="td-cart">
            <td >
                <div class="cart-info">
                    <img class="imge-cart"   src="../project-myserves/layot/img/<?php echo $row['IMG'] ?>" alt="">
                    <div>
                        <p style="font-weight:800;font-size:20px"><?php echo $row["TITLE"] ?></p>
                        <small style="font-weight:800 ;font-size:15px"><?php echo $row['first_name'] . " " . $row['last_name']; ?></small>
                        <br>
                    </div>
                </div>
            </td>
            <td ><button type="submit " name = "delete" style="background: none; border: none;" ><i class="fa fa-trash  color-icon-cart"></i></button></td>
            <td style="font-weight:800"><?php echo $row['price'] ?></td>
          </tr>
          <tr>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>

            <?php?>
            
            </tr>
              <?php if(isset($_POST['delete'])) {
                  
                $stmt = $con->prepare("DELETE FROM orders WHERE id = '".$row['Order_ID']."'");
                $stmt->execute();
                echo '<script>alert("تم إالغاء الطلب")</script>';
                $Location = "required-service.php";
                redirectHome($Location);
              } } ?>
        </table>
            </form>
    </div> 
    <?php 
        include("include/footer.php");
    }else
    {
        header("Location: main-login.php");
    }
?>










