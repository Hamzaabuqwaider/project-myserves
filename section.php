<?php 
ob_start();
    $titlePage = "section";
    include ("include/session.php");
    include ("include/connect.php");
    include ("include/header.php");
    include ("include/topnav.php");
    include ("include/function.php");
//    include('include/loding.php');
if(isset($_SESSION['userid'])) {
$Cat_id = isset($_GET['Cat_id']) && is_numeric($_GET['Cat_id']) ? intval($_GET['Cat_id']) :0;



$stmt = $con-> prepare("SELECT * FROM post  WHERE category_id = ? ");
$stmt->execute(array($Cat_id));
$posts = $stmt->fetchAll();

$stmt1 = $con-> prepare("SELECT Name FROM sub_category  WHERE id = ? ");
$stmt1->execute(array($Cat_id));
$sub = $stmt1->fetch();




?>

<div class="namesaction">
    <div class="row">
        <div class="container">
            <div class="col-lg col-md col-sm col-xs">
                    <h1 class="colarname"><?php echo $sub['Name']; ?> </h1>
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
                <?php if(!empty($posts)): foreach($posts as $post): 
                    regester($post['id']);
                    if($post['RegStatus'] == 1) { 
                        $stmt2 = $con->prepare("SELECT * FROM rating WHERE post_id = ?");
                        $stmt2->execute([$post['id']]);
                        $ratings = $stmt2->fetchAll();
                        $sumRating = 0;
                        foreach($ratings as $rating) {
                            $sumRating += $rating['number_rating'];
                        }
                        $numberpeople = count($ratings);
                        $avarage = $numberpeople != 0 ?  floor($sumRating / count($ratings)) : $sumRating;
                    
                    ?>
                     
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs">

                    <article class="material-card Red">
                <div id="description-box" class="description-front-box ">
                <h2><?php echo $post['title']?></h2>
                    <p><i class="far fa-eye" style="margin-left:5px;color: #f8f9fa;"></i>50 من طلبوا هذه الخدمة</p>
                    <a href="details-test.php?id=<?= $post['id']?>"><button type="button" class="btn btn-outline-light" style="font-weight: bold;">تفاصيل الخدمة</button></a>
                </div>
              
                <div class="mc-content">
                <div id="" class="color-overlay-section-main mains-sections"></div>
                    <div class="img-container">
                        <img class="img-responsive" src="../project-myserves\layot\img\<?php echo $post['img'];?>">
                    </div>
                    <div class="mc-description">
                    <div class="description-back-box">
                        <h2><?php echo $post['title']?></h2>
                        <p><i class="far fa-eye" style="margin-left:5px;color: #f8f9fa;"></i>50 من طلبوا هذه الخدمة</p>
                    </div>
                      <div class="ul-details-tow-ico">
                         <ul>
                            <li><i class="fas fa-truck"></i><span>10 طلبات جاري تنفيذها</span></li>
                            <li> <i class="fas fa-reply"></i><span>م. سرعة رد: 10 ساعات</span></li>
                         </ul>
                       </div>
                       <div class="visit-wibsite">
                        <div class="rating col-12 pl-0 rating-show"><!--
                            --><a href="details-test.php?id=<?= $post['id'] ?>" class="<?= $avarage == 5 ? "select" : "" ?>" title="Give 5 stars">★</a><!--
                            --><a href="details-test.php?id=<?= $post['id'] ?>" class="<?= $avarage == 4 ? "select" : "" ?>" title="Give 4 stars">★</a><!--
                            --><a href="details-test.php?id=<?= $post['id'] ?>" class="<?= $avarage == 3 ? "select" : "" ?>" title="Give 3 stars">★</a><!--
                            --><a href="details-test.php?id=<?= $post['id'] ?>" class="<?= $avarage == 2 ? "select" : "" ?>" title="Give 2 stars">★</a><!--
                            --><a href="details-test.php?id=<?= $post['id'] ?>" class="<?= $avarage == 1 ? "select" : "" ?>" title="Give 1 star">★</a>
                            </div>
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
                <?php  }endforeach; else: ?>
               <span style="width:100%;text-align:center;font-size:20px;font-family: inherit;font-weight: 600;color: #aaa;"><i class="fas fa-exclamation-triangle" style="margin-left: 10px;color: #ff0000b5;"></i>لا يوجد اي خـدمة مقدمـة</span>
               <?php endif; ?>


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
            <h3>ما هي أهمية المواقع الإلكترونية؟</h3>
            <p>ساهمت المواقع الإلكترونية بتوسيع نطاق إمكانية تحقيق العديد من الأمور، وأتاحت ملايين الفرص والأفكار للأفراد، كما غيّرت أنماط حياة الناس في جميع أنحاء العالم، حيث أصبح بإمكان الناس الاتصال والتفاعل مع بعضهم البعض من خلال هواتفهم وأجهزة الكمبيوتر المحمولة أينما كانوا، مما غيّر في نهج الأعمال التجارية وعملياتها،</p>
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               أهمية المواقع الإلكترونية في مجال الأعمال  
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                        ساهمت المواقع الإلكترونية في حل مشكلة نقص الوقت، وعدم توّفر المال الكافي، من خلال التعجيل بإنجاز العمل الروتيني، ولا سيّما العمل الحكومي، حيث يمكن تنفيذ معظم الأعمال اليومية بكل سهولة وسرعة من خلال مواقع الإنترنت المتخصصة مثل المواقع الحكومية.
                         </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">أهمية المواقع الإلكترونية في مجال التعليم </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        توّفر المواقع الإلكترونية المعلومات بشكلٍ مجاني لمختلف الأشخاص، من خلال الموسوعات الإلكترونية، والمواقع المتخصصة بأنواع معينة من العلوم والمعارف، حيث أصبح بمقدور أي شخص الحصول على المعرفة التي يريدها، كما يُمكن الحصول على المعلومات في أي وقت بسهولة.  </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">أهمية المواقع الإلكترونية للترفيه والتواصل الاجتماعي</button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                        أتاحت المواقع الإلكترونية للأشخاص مشاهدة القنوات التلفزيونية، ولعب الألعاب المسلية، ومشاهدة الأفلام والرسوم المتحركة، وقراءة الكتب في أي مكان في العالم، وفي أي وقت، كما ساهمت بتسهيل متعة التسوق عبر مواقع التسوق الإلكتروني، حيث يمكن للأفراد شراء أي شيء يحتاجون إليه من أي مكان في العالم من خلال هذه المواقع.                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">مساوئ المواقع الإلكترونية</button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        أدّت المواقع الإلكترونية إلى ارتكاب بعض الجرائم مثل عمليات القرصنة، ومن الأمثلة على ذلك تحميل أحدث الألبومات والأفلام بطرق غير مشروعة على المواقع الإلكترونية بحيث يتسنى لمختلف الأشخاص الحصول عليها مجانًا؛ ممّا يُلحق الضرر بالفنانين، ومطوري البرامج، وشركات الإنتاج.                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<!--end about prodacts and services-->
<?php include ("include/footer.php"); }else {
        header("Location: main-login.php");
    }
?>