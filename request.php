<?php

include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include ("include/function.php");
include("include/loding.php");

if(isset($_SESSION["userid"]))
{
    
    if(isset($_POST['save'])){
        $From = $_SESSION["userid"];
        $to = (int)$_GET["user_id"];
        $post_name = $_GET["post_name"];
        $post_id = (int)$_GET["post_id"];
        $price = $_POST["price"];
        
         //var_dump($post_name);
         //var_dump((int)$post_id);
         //ar_dump($to);
      
    

    

    // var_dump("INSERT INTO order SET to_id = ? , from_id = ?, post_name = ?, post_id = ?");
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
   <form method="POST"   class= "text-center">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px; margin-top:150px" /><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Thank You For Your Order! </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                  <input id="requst" type="text" class="form-control" > </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> دفع </td>
                                            </tr>
                                            <tr>
                                                <td id="discount" width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> 5% </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> عمولة الموقع </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"><span> <input class="form-control" id="moyna" type="text" name="price" value="$" ></span>المجموع</td>
                                            </tr>
                                        </table>
                                        <a href="order.php"> <input class="btn btn-primary " type="submit" value="طلب الخدمة" name="save"></a>

                                    </td>
                                </tr>

                            </table>
                           
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </form>
    <?php
    }else{
        echo "not Found ";
    }
    
    ?>
    <script src="layot/js/jquery-3.5.1.min.js"></script>
        <script src="layot/js/popper.min.js"></script>
        <script src="layot/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://pagead2.googlesyndication.com/pagead/managed/js/adsense/m202110050101/show_ads_impl_fy2019.js" id="google_shimpl"></script><script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
        <script src="layot/js/ajax.js"></script>
        <script src="layot/js/main.js"></script>
        <script src="layot/js/wow.min.js"></script>
        <script>
          AOS.init();
        </script>
        <script>new WOW().init();</script>
</body>
</html>
