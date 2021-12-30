<?php 
ob_start();
    $titlePage = "section";
    include ("include/session.php");
    include ("include/connect.php");
    include ("include/header.php");
    include ("include/topnav.php");
    include ("include/function.php");
   include('include/loding.php');

if(isset($_SESSION['userid'])) {
$Cat_id = $_GET['Cat_id'];
$stmt = $con-> prepare("SELECT * FROM post WHERE main_title = ? ");
$stmt->execute(array($Cat_id));
$stmt = $stmt->fetchAll();


?>

<div class="namesaction">
    <div class="row">
        <div class="container">
            <div class="col-lg col-md col-sm col-xs">
                    <h1 class="colarname">أعمال</h1>
                    <p>احصل على الدعم اللازم لتسيير أعمالك بشكل أكثر سلاسة</p>
            </div>
        </div>
    </div>
</div>
<!-- end name and drodawn create ghazal-->
<!-- start section box create ghazal-->
<div class="section-box text-center">
    <div class="row">
        <div class="container">
            <div class="card-group">

                <?php foreach($stmt as $sectionId) { 
                    regester($sectionId['id']);
                    if($sectionId['RegStatus'] == 1) { 
                    
                    ?>
                     
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs">

                    <article class="material-card Red">
                <div id="description-box" class="description-front-box ">
                <h2><?php echo $sectionId['title']?></h2>
                    <p><i class="far fa-eye" style="margin-left:5px;color: #f8f9fa;"></i>50 من طلبوا هذه الخدمة</p>
                    <a href="details-test.php?id=<?= $sectionId['id']?>"><button type="button" class="btn btn-outline-light" style="font-weight: bold;">تفاصيل الخدمة</button></a>
                </div>
              
                <div class="mc-content">
                <div id="" class="color-overlay-section-main mains-sections"></div>
                    <div class="img-container">
                        <img class="img-responsive" src="../project-myserves\layot\img\<?php echo $sectionId['img'];?>">
                    </div>
                    <div class="mc-description">
                    <div class="description-back-box">
                        <h2><?php echo $sectionId['title']?></h2>
                        <p><i class="far fa-eye" style="margin-left:5px;color: #f8f9fa;"></i>50 من طلبوا هذه الخدمة</p>
                    </div>
                      <div class="ul-details-tow-ico">
                         <ul>
                            <li><i class="fas fa-truck"></i><span>10 طلبات جاري تنفيذها</span></li>
                            <li> <i class="fas fa-reply"></i><span>م. سرعة رد: 10 ساعات</span></li>
                         </ul>
                       </div>
                       <div class="visit-wibsite">
                            <ul>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star set-white"></i></li>
                            </ul>
                        </div>                    
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <a href=""><button type="button" class="btn btn-outline-light">طلب الخدمة</button></a>
                </div>
            </article>
                </div>
                <?php } }?> 


            </div>
        </div>
    </div>
    <div class="butoom-section">
        <button type="button" class="btn btn-dark">عرض المزيد</button>
    </div>
</div>
<!-- end section box create ghazal-->
<!--start about prodacts and services-->
<div class="infromtion text-center">
    <div class="row"> 
        <div class="col-lg-12 col-md col-sm d-none d-sm-block">
            <h3>أمّن أعمالك في ضوء استشارة قانونية من خبير</h3>
            <p>في مواقف مختلفة من الحياة العملية والاجتماعية تحتاج إلى مساعدة قانونية تضعك على المسار الآمن بحيث تحفظ حقوقك وتحميك من المساءلة. أيا كانت المساعدة التي تحتاجها سواء استشارة قانونية أو صياغة وثيقة هامة، ستعثر هنا على خبراء قانونيين من بلدان مختلفة يقدمون لك المساعدة القانونية الموثوقة.</p>
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">ما هي الاستشارات القانونية؟</button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            الاستشارات القانونية هي الإرشادات القانونية التي يحتاجها العميل سواء كان فردًا أو شركة لاتخاذ قرار أو إتمام إجراء ما بشكل آمن دون الدخول في تعقيدات قانونية أو الوقوع تحت طائلة القانون.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">ماهي الخبرة القانونية لمقدمي تلك الاستشارات؟ </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            ل آمن دون الدخول في تعقيدات قانونية أو الوقوع تحت طائلة القانون.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">متى أحتاج إلى استشارة قانونية؟</button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            الاستشارات القانونية هي الإرشادات القانونية التي يحتاجها العميل سواء كان فردًا أو شركة لاتخاذ قرار أو إتمام إجراء ما بشكل آمن دون الدخول في تعقيدات قانونية أو الوقوع تحت طائلة القانون.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">ما هي الطريقة التي أحصل بها على الاستشارة القانونية؟</button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            بشكل آمن دون الدخول في تعقيدات قانونية أو الوقوع تحت طائلة القانون.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<!--end about prodacts and services-->
<?php include ("include/footer.php");
     }else {
        header("Location: main-login.php");
    }
?>