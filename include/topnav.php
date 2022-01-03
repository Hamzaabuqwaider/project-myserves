<!--start navbar-->
<nav class="navbar navbar-edit navbar-expand-lg navbar-light back-color-nav <?= !isset($_SESSION['userid']) ? "test-login" : "" ?> <?= (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 1) ? "user-nav" : "customer-nav" ?>">
                    <a class="navbar-brand logo" href="index.php"><span>خد</span>متك</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active nav-margin">
                    <?php 
                    if(isset($_SESSION['userid']))
                    {
                        switch ($_SESSION['usertype']) {
                            case "1": ?>
                                <a class="nav-link main-text-nav" href="add-serves.php?action=Add&userid=<?php echo $_SESSION['userid'] ;?>"><i class="fas fa-plus"></i>اضف خدمة</a>
                              <?php
                            case "2":
                                echo '';
                                break;
                            default:
                            echo  '';
                        }
                    ?>
                        </li>
                        <li class="nav-item custom-nav-section">                                              
                        <a class="nav-link  main-text-nav" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-align-justify"></i>الاقسام</a>     
                        </a>

                            <div class="dropdown-menu section-navbar" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="freelansiter-section.php"><i class="fas fa-laptop-house"></i>قسم العمل الحر</a>
                                <a class="dropdown-item" href="serves-section.php"><i class="far fa-building"></i>قسم الخدمات</a>
                            </div>

                        </li><?php } ?>
                        <?php  if(isset($_SESSION['userid'])) { ?>
                        <li class="nav-item custom-nav-order">
                          <a class="nav-link main-text-nav" href="order.php?do=Manage"><i class="fas fa-briefcase"></i>الخدمات المطلوبة</a>
                        </li>
                        <?php }    ?>
                        <li class="nav-item">
                          <?php 
 
                            if(isset($_SESSION['userid']))
                            {
                                switch ($_SESSION['usertype']) {
                                    case "1": ?>
                                        <a class="nav-link main-text-nav" href="required-service.php"><i class="fas fa-ambulance"></i>الطلبات الواردة</a> <?php
                                    case "2":
                                        echo '';
                                        break;
                                    default:
                                    echo  '';
                                }
                            ?>
                        </li>
                        <!--start serch-->
                        <li class="nav-item icon-nav-space">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search icon-nav"></i>
                            </a>
                            <div class="dropdown-menu serch-dropdown" aria-labelledby="navbarDropdownMenuLink">
                                    <form class="form-inline">
                                        <input class="form-control mr-sm-2" id="conutry" style="width:100%;margin-right: 0px !important;border-radius: 0;" type="search" placeholder="Search" aria-label="Search">
                                        <div id="countrylist"></div>
                                    </form>
                            </div>
                        </li> <?php } ?>
                         <!--end serch-->
                         <!--start notification-->
                         <?php
                                    if(isset($_SESSION["userid"]))
                                    {   ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-bell icon-nav"></i>
                            </a> 
                            <div class="dropdown-menu continar-notification" aria-labelledby="navbarDropdownMenuLink">
                                <ul class="list-group ">
                                    <li class="list-group-item">
                                       <img class="img-profile" src="layot/img/pexels-cottonbro-4778611.jpg">
                                       <span class="text-notification">
                                           لأسف، تم رفض الخدمة التي أرسلتها: تصميم وانشاء صفحات ومواقع ويب (Web-developer). سبب الرفض:
                                           المرجو تحديد حجم العمل الذي ستقدمه مقابل 5$ بدقة في الوصف. المرجو تحديد حجم العمل الذي ستقدمه في تطويراتك بدقة.
                                           طلب التعامل أو التواصل خارج موقع خدمتك أو إضافة وسائل تواصل مثل البريد الإلكتروني  
                                       </span>
                                       <span class="time-notification"><i class="far fa-clock"></i> منذ 4 أشهر و7 أيام</span>
                                    </li>
                                    <li class="list-group-item">
                                       <img class="img-profile" src="layot/img/pexels-cottonbro-4778611.jpg">
                                       <span class="text-notification">
                                           لأسف، تم رفض الخدمة التي أرسلتها: تصميم وانشاء صفحات ومواقع ويب (Web-developer). سبب الرفض:
                                           المرجو تحديد حجم العمل الذي ستقدمه مقابل 5$ بدقة في الوصف. المرجو تحديد حجم العمل الذي ستقدمه في تطويراتك بدقة.
                                           طلب التعامل أو التواصل خارج موقع خدمتك أو إضافة وسائل تواصل مثل البريد الإلكتروني  
                                       </span>
                                       <span class="time-notification"><i class="far fa-clock"></i> منذ 4 أشهر و7 أيام</span>
                                    </li>
                                    <li class="list-group-item">
                                       <img class="img-profile" src="layot/img/pexels-cottonbro-4778611.jpg">
                                       <span class="text-notification">
                                           لأسف، تم رفض الخدمة التي أرسلتها: تصميم وانشاء صفحات ومواقع ويب (Web-developer). سبب الرفض:
                                           المرجو تحديد حجم العمل الذي ستقدمه مقابل 5$ بدقة في الوصف. المرجو تحديد حجم العمل الذي ستقدمه في تطويراتك بدقة.
                                           طلب التعامل أو التواصل خارج موقع خدمتك أو إضافة وسائل تواصل مثل البريد الإلكتروني  
                                       </span>
                                       <span class="time-notification"><i class="far fa-clock"></i> منذ 4 أشهر و7 أيام</span>
                                    </li>
                                    <li class="list-group-item">
                                       <img class="img-profile" src="layot/img/pexels-cottonbro-4778611.jpg">
                                       <span class="text-notification">خدمتك بانتظار المراجعة حالياً، سيصلك إشعار حين إتمام مراجعتها من قبل فريقنا.</span>
                                       <span class="time-notification"><i class="far fa-clock"></i> منذ 4 أشهر و7 أيام</span>
                                    </li>
                                </ul>
                                    <div class="card-header footer-notification">
                                         <i class="far fa-bell"></i><a href="#">عرض جميع الاشعارات</a>
                                    </div>
                            </div>   
                        </li>

                         <!--end notification-->
                         <!--start maseges-->
                         <li class="nav-item">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="far fa-envelope icon-nav"></i>
                            </a> 
                            <div class="dropdown-menu continar-notification continar-maseges" aria-labelledby="navbarDropdownMenuLink">
                                <ul class="list-group ">

                                        <?php
                                        $roo = $_SESSION["userid"];
                                        $chat = $con->prepare("SELECT *, users.id as id,users.imgg as img ,chat.to_id as CHAT_ID,chat.from_id as FROM_ID  FROM users
                                        INNER JOIN chat ON chat.from_id = users.id
                                        WHERE chat.to_id = '$roo' ORDER BY chat.chat_id DESC LIMIT 5 ");

                                        $chat->execute();
                                        $stmt = $chat->fetchAll();

                                        if(!empty($stmt)){
                                        
                                        foreach($stmt as $row){
                                    ?>
                                    <div class="bgchat">
                                    <a href="chat2.php?user_id=<?php echo $_SESSION['username'];?>&post=<?php echo $row['FROM_ID'] ?>">
                                    <li class="list-group-item tow-bg ">
                                        
                                            <img class="img-profile" src="layot/img/<?php echo $row["img"];?>">
                                            <span class="time-notification"><i class="far fa-clock"></i><?php echo $row["created_at"];?></span>
                                            <span class="text-notification text-maseges">
                                                <?php echo $row["first_name"]." ".$row["last_name"];?>
                                            <p class="maasage-chat-ul"><?php echo $row["message"];?></p>
                                            
                                    </li>
                                    </a>
                                    </div>
                                <?php }}else{ ?>

                                    <div class="alert alert-info 
                                            text-center">
                            <i class="fa fa-comments d-block fs-big"></i>
                            No messages yet, Start the conversation
                        </div>
                               <?php  } ?>
                                </ul>
                                    <div class="card-header footer-notification">
                                         <i class="far fa-envelope"></i><a href="#">عرض جميع الرسائل</a>
                                    </div>
                            </div>   
                        </li>
                        <?php } ?>
                         <!--end maseges-->
                         <?php
                         if(isset($_SESSION['userid']))
                         {
                            $User = $con->prepare('SELECT imgg FROM users WHERE id ="'.$_SESSION['userid'].'"');
                            $User->execute();
                            $info = $User->fetch();
                         ?>
                         <!--start profile-->
                         <li class="nav-item dropdown">
                            <a class="nav-link " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="main-img-profile" src="layot/img/<?php echo $info['imgg'] ?>">
                            </a>
                            <div class="dropdown-menu drop-nav-profile" aria-labelledby="navbarDropdownMenuLink">
                         
                            <?php 
                         }
                    if(isset($_SESSION['userid']))
                    {
                        switch ($_SESSION['usertype']) {
                            case "1": ?>
                                <a class="dropdown-item" href="khadmatuk.php?do=Manage&userid=<?php echo $_SESSION['userid']?>"><i class="far fa-address-card"></i>خدماتي</a>
                                <a class="dropdown-item" href="Account-balance.php"><i class="fas fa-wallet"></i>الرصيد</a>
                                
                            <?php
                            case "2":
                                echo '';
                                break;
                            default:
                            echo  '';
                        }
                    ?>

                                <a class="dropdown-item" href="edit-inforamtion.php?do=Edit&userid=<?php echo $_SESSION['userid']?>"><i class="fas fa-user-edit"></i>تعديل الحساب</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-door-open"></i> خروج</a>
                            </div>
                        </li>
                        <?php }else {
                            echo "<a href='main-login.php'class='btn  btn-outline-light'style='padding: 10px 45px;'><i class='fas fa-sign-in-alt'></i>&nbsp;سجل الان</a>";
                            } ?>
                         <!--end profile-->
                    </ul>
                </div>
            </nav>