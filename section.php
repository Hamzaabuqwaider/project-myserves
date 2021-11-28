<?php 
    include ("include/session.php");
    include ("include/connect.php");
    include ("include/header.php");
    include ("include/topnav.php");
    // include ("include/function.php");
    include('include/loding.php');
?>
<!-- start name and drodawn create ghazal-->
<?php 
// $sort = 'DESC';
// $sort_array = array('DESC');
// if(isset($_GET['sort']) && in_array($_GET['sort'] && isset($_POST['desc']) , $sort_array)){
//     $sort = $_GET['sort'];
//     $stmt = $con-> prepare("SELECT * FROM post WHERE category_id = ? AND ORDER BY id $sort");
//     $stmt->execute();
//     $stmt = $stmt->fetchAll();
// }

$Cat_id = isset($_GET['Cat_id']) && is_numeric($_GET['Cat_id']) ? intval($_GET['Cat_id']) :0;
$stmt = $con-> prepare("SELECT * FROM post WHERE category_id = ? ");
$stmt->execute(array($Cat_id));
$stmt = $stmt->fetchAll();
?>

<div class="namesaction">
    <div class="row">
        <div class="container">
            <div class="col-lg col-md col-sm col-xs">
                <button class="btn  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">خدمات مميزه </button>
                    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">خدمات مميزة</a>
                        <a class="dropdown-item" name ="desc" href="?sort=DESC">أضيفيت حديثا</a>
                    </div>
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
                <?php foreach($stmt as $sectionId) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs">

                    <div class="card">

                        <div class="img">
                            
                            <img class="card-img-top" src="../project-myserves\layot\img\<?php echo $sectionId['img'];?>" alt="Card image cap">
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
                        <div class="vist">
                            <h3>1000<i class="far fa-eye"></i></h3>
                        </div>
                        <div class="card-body">
                            <hr>
                            <h5 class="card-title"><?php echo $sectionId['title']?></h5>
                        </div>
                        <div class="card-footer">
                        <a href="detailsservice.php?id=<?= $sectionId['id']?>"> <button type="button" class="btn btn-primary"> تفاصيل الخدمه</button></a>
                        </div>
                    </div>
                </div>
                <?php } ?> 

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
<?php include ("include/footer.php");?>