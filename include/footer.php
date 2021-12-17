<?php 
include ("include/connect.php");
?>
   <!--footer-->
    <footer class="section-footer">
    <div class="main-containers" >
        <div class="row">
            <div class="col-lg-4">
                <div class="card sys-description-box">
                    <div class="card-body">
                        <div class="sys-logo">
                            <a class="navbar-brand logo" href="mainpage.php"><span>خد</span>متك</a>
                        </div>
                        <p class="sys-description">يمكنك خدمتك من البحث وايجاد الخدمات التي تبحث عنها بكل سهولة,كما يمكنك الاستفادة منه عن طريق البحث عن وظيفة في مجال عملك.</p>
                        <div class="sys-links">
                            <a href="https://www.facebook.com" target="blank" class="facebook"><i class="fab fa-facebook"></i></a>
                            <a href="https://www.twitter.com" target="blank" class="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com" target="blank" class="instagram"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com" target="blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card footer-boxs text-center">
                    <div class="card-body">
                        <h5 class="card-title headers-footer">الروابط السريعة</h5>
                        <div class="quick-links">
                            <a href="#">اضف خدمة</a>
                            <a href="#">الاقسام</a>
                            <a href="#">الخدمات المطلوبة</a>
                            <a href="#">الطلبات الواردة</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card footer-boxs">
                    <div class="card-body">
                        <h5 class="card-title headers-footer">التواصل</h5>
                        <div class="contant-info">
                            <div class="info">
                                <div class="info"><span>العنوان:</span>المفرق - جامعة آل البيت</div>
                                <div class="info"><span>البريد الألكتروني:</span><a href="mailto:khidmitacoff@gmail.com">khidmitacompany@gmail.com</a></div>
                                <div class="info"><span>رقم الهاتف:</span><a href="tel: 0782514663">+962-78-2514663</a></div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-lg-3">
                <div class="card footer-boxs">
                    <div class="card-body">
                        <h5 class="card-title headers-footer">خدمة العملاء</h5>
                            <div class="info">
                                <div class="customer-service">
                                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                                <?php 
                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
                                        $email = $_POST['email'];
                                        $message = $_POST['Message'];
                                        $id = $_SESSION['userid'];
                                        if(isset($_POST['send'])) {
                                            $stmt = $con->prepare("INSERT INTO 
                                            notes (Email , Message, note_user)
                                            VALUES(:zemail,:zmessage,:unote)");
                                                $stmt->execute(array(
                                                'zemail'     =>$email,
                                                'zmessage'     =>$message,
                                                'unote'      =>$id
                                            ));
                                            echo "<script>alert('تم إرسال ملاحظتك');</script>";
                                        }
                                    }
                                            ?>
                                            <fieldset class="form-group">
                                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="ألبريد الألكتروني">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <textarea class="form-control" name="Message" id="exampleMessage" placeholder="ألرسالة"></textarea>
                                            </fieldset>
                                            <fieldset class="form-group text-xs-right">
                                                    <button type="submit" name="send" class="btn btn-outline-light">أرسال</button>
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                    </div>
                </div>  
            </div>   
        </div>
    </div>
    <footer class="main-footer">
        <div class="main-containers">
            <div class="content">
                حقوق النشر &copy; 2021 جميع الحقوق محفوظه ل خدمتك | هذا الموقع الألكتروني مدعوم من قبل جامعة آل البيت </div>
        </div>
    </footer>
</footer>

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
