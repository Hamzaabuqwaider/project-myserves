<?php 
   $titlePage = "admin-home";
   include ("include/session.php");
   include ("include/connect.php");
   include ("include/header-admin.php");
   include ("include/navadmin.php");
   include ("include/function.php");

   if(isset($_SESSION['admin'])) { 
            
    $stmt1 = $con->prepare("SELECT * FROM admin");
    $stmt1 ->execute();
    $row1 = $stmt1->fetchAll();      
            ?>

<!--start main-content-->
 <div class="wrapper">
 <div class="panel post">
    <a href="order-admin.php?do=Manage"><span><?php echo countItems('id','post') ?></span> الإعلانات</a>
  </div>
  <div class="panel comment">
    <a href="commentAll.php?do=Manage"><span><?php echo countItems('comment_id','comment') ?> </span>التعليقات</a>
  </div>
  <div class="panel page">
    <a href="section-admin.php?do=Manage"><span><?php echo countItems('id','main_categories') ?> </span>الأقسام</a>
  </div>
  <div class="panel user">
    <a href="users.php?do=Manage"><span><?php echo countItems('id','users') ?></span>المستخدمين</a>
  </div>
  <div class="row">
      <div class="col-8">
          <div class="cardsd overlay-scrollbar">
              <div class="cardsd-header">
                 <h3>الآدمـن</h3> 
                 <a href="add-admin.php?action=Add"><i class="fas fa-user-plus"></i></a>
              </div>
              <div class="cardsd-content">
                  <table>
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Date</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php foreach($row1 as $main) { ?>
                          <tr>
                              <td><?php echo $main['id']; ?></td>
                              <td><?php echo $main['admin_name']; ?></td>
                              <td><?php echo $main['email']; ?></td>
                              <td>
                                  <span class="dot">
                                      <i class="bg-success"></i>
                                      <?php echo $main['date_add']; ?>
                                  </span>
                              </td>
                          </tr>
                          <?php } ?>
                            
                      </tbody>
                  </table>
              </div>
          </div>
          
      </div>
      <div class="col-4">
                    <div class="cardsd">
                        <div class="cardsd-header">
                           <h3>progress</h3>
                           <i class="fa fa-ellipsis-h"></i>
                        </div>
                       <div class="cardsd-content">
                         <div class="progressd-wrapper">
                            <p>less than 1hour
                            <span class="float-lefts">50%</span>
                            </p>
                            <div class="progress">
                               <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="progressd-wrapper">
                            <p>1-3 hours
                            <span class="float-lefts">25%</span>
                            </p>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="progressd-wrapper">
                            <p>more than 3 hours
                            <span class="float-lefts">75%</span>
                            </p>
                            <div class="progress">
                               <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="progressd-wrapper">
                            <p>more than 6 hours
                            <span class="float-lefts">85%</span>
                            </p>
                            <div class="progress">
                               <div class="progress-bar bg-danger" role="progressbar" style="width: 85%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                       </div>
                    </div>
                </div><!--row1-->
                <div class="col-12">
                    <div id="piechart" style="width: 900px; height: 500px;"></div>
                </div>
           </div><!--wrapper1-->
            

<!--end main-content-->



<?php include ("include/footer-admin.php"); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([

          <?php $stmt = $con->prepare("SELECT * FROM post");
                          $stmt->execute();
                          $posts = $stmt->fetchAll();
                          $Stars5 = 0;
                          $Stars4 = 0;
                          $Stars3 = 0;
                          $Stars2 = 0;
                          $Stars1 = 0;
          foreach($posts as $post) {
            $sumRating = 0; $avarge = 0;
            $stmt2 = $con->prepare("SELECT * FROM rating WHERE post_id = ?");
            $stmt2->execute([$post['id']]);
            $ratings = $stmt2->fetchAll();
            foreach($ratings as $rating){
                $sumRating += $rating['number_rating'];
            }
            $numberpeople = count($ratings);
            $avarge = $numberpeople != 0 ?  floor($sumRating / count($ratings)) : $sumRating;
            if($avarge  == 5) {
                $Stars5++;
            }elseif($avarge == 4){
                $Stars4++;
            }elseif($avarge == 3){
                $Stars3++;
            }elseif($avarge == 2){
                $Stars2++;
            }elseif($avarge == 1){
                $Stars1++;
            }
        }
    ?>
          ['main_title','main_title'],
          ['5 Stars', <?=$Stars5?>],
          ['4 Stars', <?=$Stars4?>],
          ['3 Satrs', <?=$Stars3?>],
          ['2 Stars', <?=$Stars2?>],
          ['1 Stars', <?=$Stars1?>]
        ]);

        var options = {
          legend: 'none',
        pieSliceText: 'label',
        title: 'عدد تقيم الإعلانات',
        pieStartAngle: 100,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <?php } else{
header('Location: index.php');
} ?>