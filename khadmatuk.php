<?php
$titlePage = "order";
ob_start();
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include ("include/function.php");
include('include/loding.php');
?>

  <div class="cart-page ">
    <table class="table-cart" >
        
        <tr class="th-cart">
            <th style="text-align: right;" class="padding-deeto">الخدمه</th>
            <th>عرض الخدمه</th>
            <th >تعديل الخدمة</th>
            <th>حذف الخدمه</th>
        </tr>
        <tr>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
          </tr>
        <tr class="td-cart">
            <td >
                <div class="cart-info">
                    <img class="imge-cart"  src="../project-myserves/layot/img/hamzahQQQ.jpg" alt="">
                    <div>
                        <p style="font-weight:800;font-size:20px;margin-top:25px;">حمزة لدهان السيارات</p>
                    </div>
                </div>
            </td>
            <td ><a href="#"><i class="fas fa-eye color-icon-cart-tow"></i></a></td>
            <td ><a href="#"><i class="fas fa-tools color-icon-cart"></i></a></td>
            <td ><a href="#"><i class="fa fa-trash  color-icon-cart"></i></a></td>
          </tr>
          <tr>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
            <td style="padding:5px"></td>
          </tr>
    </table>
</div>


<?php include ("include/footer.php");?>