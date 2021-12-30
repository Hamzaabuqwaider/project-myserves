<?php
    $titlePage = "home-page";
    include ("include/session.php");
    include ("include/connect.php");
    include ("include/header.php");
    include ("include/topnav.php");
    include ("include/function.php");
    include('include/loding.php');
    
?>

 <!-- ;$pageTitle = 'Sections' -->
   <!---start background-->
        <header class="background-section">
        
            <article class="video-container">
                    <div class="color-overlay"></div>
                        <video src="layot/img/pexels-rodnae-productions-7414128.mp4" autoplay loop muted></video>
                        <div class="background-text">
                            <h1>أنجز مشاريعك عبر الإنترنت بسهولة وأمان</h1>
                            <p>قدم خدماتك واعمالك عند التسجيل</p>
                            <?php if(!isset($_SESSION['userid'])) {
                            echo '<a href="Signup.php"><button type="button" class="btn btn-outline-secondary"><i class="fas fa-sign-in-alt"></i>&nbsp;سجل الآن</button></a>';
                            } ?>
                        </div>
            </article>
        </header>
<!---end background-->
<!--how to work ---->
<div class="container">
    <div class="how-to-work">
        <h1>طريقة عمل <span>خد</span>متك </h1>
            <div class="row">
                <div class="col-sm-5 col-md-6">
                    <h3><i class="fas fa-check-circle"></i>&nbsp; اضف خدمتك</h3>
                    <p>اضف خدمتك او العمل الذي تستطيع تقديمه والعمل به.</p>

                    <h3><i class="fas fa-check-circle"></i>&nbsp; اختر المشروع</h3>
                    <p>اختر المشروع المناسب  من المشاريع المقدمة لك.</p>

                    <h3><i class="fas fa-check-circle"></i>&nbsp; استلم المشروع</h3>
                    <p>بعض اختيار المشروع والتواصل مع الشخص مقدم العرض تستطيع استلام المشروع والبدء فيه.</p>
                </div>
                <div class="col-sm-4 col-md-5 work-img">
                    <img src="layot/img/undraw_Tweetstorm_re_n0rs (1).svg">
                </div>
        </div>
    </div>
</div>
<!--how to work ---->
<!--section-mainpage-->
<div class="container sections-mainpage">
    <h1>بعض الاقسام والاعمال في لموقع</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="main-body-img">
                <div class="color-overlay-section-main-page"></div>
                <img src="layot\img\pexels-lukas-574071.jpg" alt="">
                <div class="text-section-main-page">
                    <a href="#">برمجة وتطوير</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="main-body-img">
                <div class="color-overlay-section-main-page"></div>
                <img src="layot\img\pexels-mikael-blomkvist-6476254.jpg" alt="">
                <div class="text-section-main-page">
                    <a href="#">اعمال</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="main-body-img">
                <div class="color-overlay-section-main-page"></div>
                <img src="layot\img\pexels-pixabay-147413.jpg" alt="">
                <div class="text-section-main-page">
                    <a href="#">تسويق الكتروني </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="main-body-img">
                <div class="color-overlay-section-main-page"></div>
                <img src="layot\img\pexels-ketut-subiyanto-4559555.jpg" alt="">
                <div class="text-section-main-page">
                    <a href="#">دورات عن بعد</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="main-body-img">
                <div class="color-overlay-section-main-page"></div>
                <img src="layot\img\pexels-kaboompics-com-6224.jpg" alt="">
                <div class="text-section-main-page">
                    <a href="#">تصميم</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="main-body-img">
            <div class="color-overlay-section-main-page"></div>
                <img src="layot\img\pexels-artem-podrez-8986145.jpg" alt="">
                <div class="text-section-main-page">
                    <a href="#">صيانة مركبات</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="main-body-img">
                <div class="color-overlay-section-main-page"></div>
                   <img src="layot\img\pexels-rodolfo-clix-1036936.jpg" alt="">
                   <div class="text-section-main-page">
                       <a href="#">كهرباء</a>
                   </div>
               </div>
           </div>
           <div class="col-md-3">
               <div class="main-body-img">
                   <div class="color-overlay-section-main-page"></div>
                   <img src="layot\img\pexels-gunnar-ridderström-4318441 (1).jpg" alt="">
                   <div class="text-section-main-page">
                       <a href="#">اقسام اخرى</a>
                   </div>
               </div>
           </div>
       </div>
   </div>
 <!--section-mainpage-->
<!---how is khidmitac--->
   <div class="how-khidmitac">
       <h1>لماذا  <span>خد</span>متك ؟</h1>
       <div class="container">
            <div class="row">
                <div class="col-md-4 box-how-khidmitac">
                    <i class="fas fa-tachometer-alt"></i>
                    <h3>نفّذ مشاريعك بسهولة</h3>
                    <p> اطرح مشروعك على أفضل الخبراء والمتخصيصين واترك مهمة التنفيد عليهم</p>
                </div>
                <div class="col-md-4 box-how-khidmitac">
                    <i class="far fa-thumbs-up"></i>              
                    <h3>وظف افضل المتخصيصين</h3>
                    <p>زُر ملفات المتخصيصين، اطلع على أعمالهم السابقة وظف الأفضل</p>
                </div>
                <div class="col-md-4 box-how-khidmitac">
                    <i class="fas fa-laptop-code"></i>
                    <h3>ادفع بكل اريحية</h3>
                    <p>ادفع بكل اريحية وامان من خلال الموقع</p>
                </div>
                <div class="col-md-4 box-how-khidmitac">
                    <i class="fas fa-users"></i>               
                    <h3>ابنِ فريق عمل متكامل</h3>
                    <p>خبراء في مختلف المجالات ومن مختلف التخصصات</p>
                </div>
                <div class="col-md-4 box-how-khidmitac">
                    <i class="far fa-handshake"></i>               
                    <h3>انجز أعمالك بسرعه</h3>
                    <p>اختر أفضل الخبراء وأرسل له الوظيفة مباشرة مع ضمان كامل حقوقك</p>
                </div>
                <div class="col-md-4 box-how-khidmitac">
                    <i class="fas fa-hand-holding-usd"></i>               
                    <h3>نفذ مشاريعك بتكاليف أقل</h3>
                    <p>وظّف أفضل الخبرات حسبما يتناسب مع ميزانيتك</p>
                </div>
           </div>
       </div>
   </div>
<!---how is khidmitac--->

<!--slider mainpage -->
<div class="container slider-mainpage">
      <h1>بعض الخدمات المميزة الموجودة في لموقع</h1>
    <div class="row">
        <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel"> 
                <article class="material-card Red ">
                <div id="description-box" class="description-front-box ">
                    <h2>ترجمة</h2>
                    <p><i class="far fa-eye" style="margin-left:5px;color: #f8f9fa;"></i>7 من طلبوا هذه الخدمة</p>
                    <button type="button" class="btn btn-outline-light" style="font-weight: bold;">تفاصيل الخدمة</button>
                </div>
                <div class="mc-content">
                <div id="" class="color-overlay-section-main mains-sections"></div>
                    <div class="img-container">
                      <img class="img-responsive" src="layot/img/pexels-cottonbro-4778611.jpg">
                    </div>
                    <div class="mc-description">
                        <div class="description-back-box">
                            <h2>ترجمة</h2>
                            <p><i class="far fa-eye" style="margin-left:5px;color: #f8f9fa;"></i>7 من طلبوا هذه الخدمة</p>
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
                    <button type="button" class="btn btn-outline-light">طلب الخدمة</button>
                </div>
            </article>

            <!---test 1--->
            <article class="material-card Red">
                <div id="description-box" class="description-front-box ">
                    <h2>تصميم</h2>
                    <p><i class="far fa-eye" style="margin-left:5px;color: #f8f9fa;"></i>30 من طلبوا هذه الخدمة</p>
                    <button type="button" class="btn btn-outline-light" style="font-weight: bold;">تفاصيل الخدمة</button>
                </div>
              
                <div class="mc-content">
                <div id="" class="color-overlay-section-main mains-sections"></div>
                    <div class="img-container">
                        <img class="img-responsive" src="layot/img/pexels-mikael-blomkvist-6476254.jpg">
                    </div>
                    <div class="mc-description">
                        <div class="description-back-box">
                        <h2>تصميم</h2>
                        <p><i class="far fa-eye" style="margin-left:5px;color: #f8f9fa;"></i>30 من طلبوا هذه الخدمة</p>
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
                    <button type="button" class="btn btn-outline-light">طلب الخدمة</button>
                </div>
            </article>
            <!---test 1--->
             <!---test 2--->
            <article class="material-card Red">
                <div id="description-box" class="description-front-box ">
                    <h2>تصميم</h2>
                    <p><i class="far fa-eye" style="margin-left:5px;color: #f8f9fa;"></i>30 من طلبوا هذه الخدمة</p>
                    <button type="button" class="btn btn-outline-light" style="font-weight: bold;">تفاصيل الخدمة</button>
                </div>
              
                <div class="mc-content">
                <div id="" class="color-overlay-section-main mains-sections"></div>
                    <div class="img-container">
                        <img class="img-responsive" src="layot/img/pexels-mikael-blomkvist-6476254.jpg">
                    </div>
                    <div class="mc-description">
                        <div class="description-back-box">
                        <h2>تصميم</h2>
                        <p><i class="far fa-eye" style="margin-left:5px;color: #f8f9fa;"></i>30 من طلبوا هذه الخدمة</p>
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
                    <button type="button" class="btn btn-outline-light">طلب الخدمة</button>
                </div>
            </article>
           <!---test 2--->


             <!---test 3--->

            <article class="material-card Red">
                <div id="description-box" class="description-front-box ">
                    <h2>برمجة صفحات امامية</h2>
                    <p><i class="far fa-eye" style="margin-left:5px;color: #f8f9fa;"></i>50 من طلبوا هذه الخدمة</p>
                    <button type="button" class="btn btn-outline-light" style="font-weight: bold;">تفاصيل الخدمة</button>
                </div>
              
                <div class="mc-content">
                <div id="" class="color-overlay-section-main mains-sections"></div>
                    <div class="img-container">
                        <img class="img-responsive" src="layot/img/pexels-lukas-574071.jpg">
                    </div>
                    <div class="mc-description">
                    <div class="description-back-box">
                        <h2>برمجة صفحات امامية</h2>
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
                    <button type="button" class="btn btn-outline-light">طلب الخدمة</button>
                </div>
            </article>
            <!---test 3--->
             <!---test 4--->

            <article class="material-card Red">
                <div id="description-box" class="description-front-box ">
                    <h2>برمجة صفحات امامية</h2>
                    <p><i class="far fa-eye" style="margin-left:5px; color: #f8f9fa;"></i>50 من طلبوا هذه الخدمة</p>
                    <button type="button" class="btn btn-outline-light" style="font-weight: bold;">تفاصيل الخدمة</button>
                </div>
              
                <div class="mc-content">
                <div id="" class="color-overlay-section-main mains-sections"></div>
                    <div class="img-container">
                        <img class="img-responsive" src="layot/img/pexels-lukas-574071.jpg">
                    </div>
                    <div class="mc-description">
                    <div class="description-back-box">
                        <h2>برمجة صفحات امامية</h2>
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
                    <button type="button" class="btn btn-outline-light">طلب الخدمة</button>
                </div>
            </article>
            <!---test 4---> 
                </div>
            </div>
        </div>
    </div>
    <!--slider mainpage -->

    <?php include ("include/footer.php");?>
