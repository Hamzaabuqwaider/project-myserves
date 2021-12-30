<?php 
session_start();
include ("include/header-admin.php");
include ("../include/connect.php");
include ("../include/function.php");

if(isset($_SESSION['admin'])){

    $do = isset($_GET['do']) ? $_GET['do'] : "Manage";

    // Start Manage Page

    if($do == 'Manage'){

        include ("include/navadmin.php");
        
        // Manage Members Page 

        // Select all users Except Admib

        $stmt = $con->prepare("SELECT * FROM users ORDER BY id DESC");

        $stmt->execute();

        $rows = $stmt->fetchAll();

        if (! empty($rows)) {
    
    ?>

  <div class="wrapper">
  <div class="container">
    <div class="tables-admin">
       <!--start taple-->
       <div class="row">
      <div class="col-12">
          <div class="cardsd-taple-page overlay-scrollbar">
              <div class="cardsd-header">
                 <h3>المستخدمين</h3> 
                  <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="cardsd-content">
                  <table>
                      <thead>
                          <tr>
                              <th> ID </th>
                              <th> Username </th>
                              <th> Email </th>
                              <th> Full Name </th>
                              <th> Date Birth </th>
                              <th>Control</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php foreach($rows as $row) { ?>
                          <tr>
                              <td><?php echo $row['id'] ?></td>
                              <td><?php echo $row['first_name'] ?></td>
                              <td><?php echo $row['Email'] ?></td>
                              <td><?php echo $row['first_name'] ."  ". $row['last_name'] ?></td>
                              <td><?php echo $row['date_birth'] ?></td>
                              <td>
                                <a href='users.php?do=Delete&User_ID=<?php echo $row['id'] ?>' class='btn btn-danger confirm'><i class='fa fa-close'></i>حذف</a>
                               <?php if ($row['RegStatus'] == 0) {
                                    echo "<a href='users.php?do=Activate&User_ID=" . $row['id'] . "' class='btn btn-info activate'><i class='fa fa-check'></i> قبول</a>";
                                   } ?>
                              </td>
                          </tr>
                          <?php } ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
       <!--end taple-->
    </div>
  </div>
</div>

        <?php } else {
         
            echo "<div class='container'>";
                echo "<div class='nice-message'>There's No users To Show</div>";
            echo "</div>";
         
        }?>

        <?php

     }  elseif($do == 'Delete'){ // Delete Member Page 

            echo "<h1 class='text-center'>Delete Page</h1>";
            echo "<div class='container'>";

            // Check if Get Request userID is Numeric & Get The Integer Value of It

            $userid = isset($_GET['User_ID']) && is_numeric($_GET['User_ID']) ? intval($_GET['User_ID']) : 0 ;
                
            //Select All Data Depend On This ID

            $check = checkItem('id', "users", $userid);

            // If There's Such ID Show The Form
            
            if($check > 0){ 
            
                $stmt = $con->prepare("DELETE FROM users  WHERE id = :zuser");

                $stmt->bindParam(":zuser",$userid);

                $stmt->execute();

                $Location = "users.php?do=Manage";

                redirectHome($Location);
        
            } else {

                $Location = "users.php?do=Manage";

                redirectHome($Location);

            }

        echo "</div>";

    } elseif ($do == "Activate") {

        $userid = isset($_GET['User_ID']) && is_numeric($_GET['User_ID']) ? intval($_GET['User_ID']) : 0 ;
            
        //Select All Data Depend On This ID

        $check = checkItem('id', "users", $userid);

        // If There's Such ID Show The Form
        
        if($check > 0){ 
        
            $stmt = $con->prepare("UPDATE users SET RegStatus = 1 WHERE id = ?");

            $stmt->execute(array($userid));

            $Location = "users.php?do=Manage";

            redirectHome($Location);
    
        } else {

            $Location = "users.php?do=Manage";

            redirectHome($Location);

        }

    echo "</div>";

    }

} else {

    header('Location: index.php');

    exit();
}
?>