<?php
$titlePage = "required-service";
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include('include/loding.php');

if(isset($_SESSION["userid"]))
{
$r =$_SESSION['userid'];
$stmt = $con->prepare("SELECT * FROM orders WHERE from_id = '$r' ");
$stmt ->execute();
$row = $stmt->fetchAll();

    $stmt1 = $con->prepare("SELECT *,orders.price as price, post.img as IMG,post.title as TITLE,post.body as BODY, users.name as namm  FROM orders
     INNER JOIN post ON post.id  = orders.post_id
     INNER JOIN users ON users.id  = orders.from_id WHERE orders.to_id = '$r' ");
    $stmt1 ->execute();
    $row1 = $stmt1->fetchAll();

        ?>
<div class="cart-page">
    <table class="table-cart" >
        
        <tr class="th-cart">
            <th style="text-align: right;">الخدمه</th>
            <th >السعر</th>
           
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
                        <small style="font-weight:800 ;font-size:15px"><?php echo $row['namm']; ?></small>
                        <br>
                    </div>
                </div>
            </td>
            <td style="font-weight:800"><?php echo $row['price'] ?></td>
          </tr>
          <tr>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
            
          </tr>
          <?php } ?>
    </table>
</div>

        <?php

    }else
    {
        header("Location: main-login.php");
    }
?>
<?php include ("include/footer.php");?>









