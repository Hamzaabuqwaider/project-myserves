<!-- start-account-balance-->
<?php
ob_start();
    $titlePage = "balance";
    include ("include/session.php");
    include ("include/connect.php");
    include ("include/header.php");
    include ("include/topnav.php");
    include('include/loding.php');

    if(isset($_SESSION["userid"]))
     {
        $SESSION = $_SESSION['userid'];
        $price = $con->prepare("SELECT * FROM orders WHERE to_id ='$SESSION'");
        $price->execute();
        $row = $price->fetchAll();
        $arr = array();
        $sum = 0;
        foreach($row as $P){
            $arr[] = $P['price'];
        }
        for ($i=0 ; $i < count($arr) ; $i++) { 
            $sum = $sum + $arr[$i];
}


?>

<div class="accountitel-ds text-center">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-4 col-md-4 -col-xs-12">
                <div class="box-account">
                    <h2 class="account-h2">الرصيد الكلي</h2>
                    <h3 class="account-h3">$<?php echo $sum;?></h2>
                    <p class=" account-p">كامل الرصيد الموجود في حسابك  يتضمن الأرباح والرصيد المعلّق أيضاً.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 -col-xs-12">
                <div class="box-account">
                    <h2 class="account-h2">رصيد معلّق</h2>
                    <h3 class="account-h3"> $1.00</h2>
                    <p class="account-p"> يتم تعليق الأرباح التي حققتها لمدة 14 يوم قبل أن تتمكن من استخدامها وسحبها</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 -col-xs-12">
                <div class="box-account">
                    <h2 class="account-h2">أرباح يمكن سحبها</h2>
                    <h3 class="account-h3"> $7.000</h2>
                    <p class="account-p">المبلغ الذي حققته من بيع الخدمات ويمكن سحبه من حسابك في <span class="i-pay">Pay</span><span class="i-pal">Pal</span></p>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col">
                <div class="account-form">
                    <h1 class="h1-form1">سحب رصيديك.</h1>
                    <form>
                        <div class="form-group">
                            <label class="label-form" for="exampleFormControlInput1 ">حسابك في <span class="form-pay">Pay</span><span class="form-pal">Pal</span>: </label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label class="label-form" for="exampleFormControlInput1 "> المبلغ المطلوب: </label>
                            <input type="text" class="form-control" id="text" placeholder="0.00">
                        </div>
                        <button type="button" class="btn btn-secondary form-btn"><a class="a-form" href="#">سحب</a> </button>
                    </form>
                    <img src="../project-myserves/layot/imge/Badge_2.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
        include ("include/footer.php");
        } else {
            header('Location: main-login.php');
            exit();
        }

        ?>
