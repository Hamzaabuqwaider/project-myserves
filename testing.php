<?php
  include ("include/header.php");
  include ("include/topnav.php");
  include('include/loding.php');
?>

<div id="wrapper">
  <div id="container">

    <div id="info">
       <div class="color-overlay-add-cart"></div>
      <img id="product" src="layot/img/pexels-artem-podrez-8986145.jpg"/>
      <a href="#" class="go-back-card"><i class="fas fa-arrow-circle-right"></i></a>
      <p>تمديد كهربائي مشاريع </p>
      <p style="top:50%;font-size:20px;">حمزة ابو قويدر</p>
    </div>

    <div id="payment">

      <form id="checkout">
          <div id="icon-card">
               <i class="fab fa-cc-visa" style="color:darkslateblue;"></i>
               <i class="fab fa-cc-paypal" style="color:#284f78d9;"></i>   
               <i class="fab fa-cc-mastercard" style="color:#0000ff82;"></i>  
           </div>           
               <div class="group">      
                <input type="text" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>أدخل المبلغ</label>
            </div>
            <div class="group">      
                <input type="text" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>ضريبة ألموقع (5%)</label>
            </div>
            <div class="group">      
                <input type="text" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>ألناتج النهائي</label>
            </div>
        <input class="btn" type="button" name="" value="طلب ألخدمة">
      </form>
    </div>

  </div>
</div>


    <?php include ("include/footer.php");?>
    <script>
   

    </script>

