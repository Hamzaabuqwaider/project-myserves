<?php 

session_start();

# check if the user is logged in
if (isset($_SESSION['username'])) {

	if (isset($_POST['message']) &&
        isset($_POST['to_id'])) {
	
	# database connection file
	include 'include/connect.php';

	# get data from XHR request and store them in var
	$message = $_POST['message'];
	$to_id = $_POST['to_id'];

	# get the logged in user's username from the SESSION
	$from_id = $_SESSION['userid'];
	$sql = "INSERT INTO 
	       chat (from_id, to_id, message) 
	       VALUES (?, ?, ?)";
	$stmt = $con->prepare($sql);
	$res  = $stmt->execute([$from_id, $to_id, $message]);
    
    # if the message inserted
    if ($res) {
    	/**
       check if this is the first
       conversation between them
       **/
       $sql2 = "SELECT * FROM conversation
               WHERE (user_1=? AND user_2=?)
               OR    (user_2=? AND user_1=?)";
       $stmt2 = $con->prepare($sql2);
	   $stmt2->execute([$from_id, $to_id, $from_id, $to_id]);

	    // setting up the time Zone
		// It Depends on your location or your P.c settings
		define('TIMEZONE', 'Africa/Addis_Ababa');
		date_default_timezone_set(TIMEZONE);

		$time = date("h:i:s a");

		if ($stmt2->rowCount() == 0 ) {
			# insert them into conversations table 
			$sql3 = "INSERT INTO 
			         conversation(user_1, user_2)
			         VALUES (?,?)";
			$stmt3 = $con->prepare($sql3); 
			$stmt3->execute([$from_id, $to_id]);
		}

		$w = $_SESSION["userid"];
        $st = $con->prepare("SELECT * FROM users WHERE id = '$w' ");
	    $st->execute();
	    $row = $st->fetch();
	   ?>
							<div class="d-flex justify-content-start mb-4">
								<div class="img_cont_msg">
									<img   src="layot/img/<?=$row['imgg']?>" class="rounded-circle user_img_msg">
								</div>
								<div class="msg_cotainer">
									<?=$message?>
									<span class="msg_time"><?=$time?></span>
								</div>
							</div>
    <?php 
     }
  }
}else {
	header("Location: main-login.php");
	exit;
}
?>