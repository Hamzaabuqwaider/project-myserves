<?php 
   $titlePage = "admin-home";
   include("../include/session.php");
   include ("include/header-admin.php");
   include ("include/navadmin.php");
   include ("../include/connect.php");
   include ("include/function.php");

   if(isset($_SESSION['admin'])){
?>

if(isset($_SESSION['admin'])){
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
                 <h3>taple</h3> 
                  <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="cardsd-content">
                  <table>
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>project</th>
                              <th>manager</th>
                              <th>status</th>
                              <th>due date</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td>react</td>
                              <td>tran anh</td>
                              <td>
                                  <span class="dot">
                                      <i class="bg-success"></i>
                                      completed
                                  </span>
                              </td>
                              <td>27/10/2021</td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td>vue</td>
                              <td>bui thn</td>
                              <td>
                                  <span class="dot">
                                      <i class="bg-success"></i>
                                      in progress
                                  </span>
                              </td>
                              <td>25/10/2021</td>
                          </tr>
                          <tr>
                              <td>3</td>
                              <td>laravel</td>
                              <td>tra gbh</td>
                              <td>
                                  <span class="dot">
                                      <i class="bg-warning"></i>
                                      in progress
                                  </span>
                              </td>
                              <td>15/10/2021</td>
                          </tr>
                          <tr>
                              <td>4</td>
                              <td>django</td>
                              <td>tranj hj</td>
                              <td>
                                  <span class="dot">
                                      <i class="bg-warning"></i>
                                      in progress
                                  </span>
                              </td>
                              <td>7/10/2021</td>
                          </tr>
                          <tr>
                              <td>5</td>
                              <td>mean</td>
                              <td>tra ncbhib</td>
                              <td>
                                  <span class="dot">
                                      <i class="bg-primary"></i>
                                      in progress
                                  </span>
                              </td>
                              <td>17/10/2021</td>
                          </tr>
                          <tr>
                              <td>6</td>
                              <td>mern</td>
                              <td>robert</td>
                              <td>
                                  <span class="dot">
                                      <i class="bg-primary"></i>
                                      pending
                                  </span>
                              </td>
                              <td>1/10/2021</td>
                          </tr>
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
           </div><!--wrapper1-->
             <div class="row">
                <div class="col-12" style="padding-top:20px;">
                    <div class="cardsd">
                        <div class="cardsd-header">
                            <h3>
                                chart js
                            </h3>
                        </div>
                        <div class="cardsd-content">
                            <canvas id="myChart" style="width:1000px!important;height:1000px!important;"></canvas>
                        </div>
                    </div>
                </div>
              </div><!--row2-->

<!--end main-content-->



<?php include ("include/footer-admin.php"); ?>

    <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: '#35434e',
                    borderColor: '#e5956096',
                    data: [0, 10, 5, 2, 20, 30, 45]
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>

    <?php }else{
        header("Location:loginadmin.php");
    } ?>
