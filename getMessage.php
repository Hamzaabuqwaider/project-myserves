<?php 

include ("include/session.php");

# check if the user is logged in
if (isset($_SESSION['username'])) {

	if (isset($_POST['id_2'])) {
	
	# database connection file
	include 'include/connect.php';

	$id_1  = $_SESSION['userid'];
	$id_2  = $_POST['id_2'];
	$opend = 0;

	$sql = "SELECT * FROM chat
	        WHERE to_id=?
	        AND   from_id= ?
	        ORDER BY chat_id ASC";
	$stmt = $con->prepare($sql);
	$stmt->execute([$id_1, $id_2]);

	if ($stmt->rowCount() > 0) {
	    $chats = $stmt->fetchAll();

	    # looping through the chats
	    foreach ($chats as $chat) {
	    	if ($chat['opened'] == 0) {
	    		
	    		$opened = 1;
	    		$chat_id = $chat['chat_id'];

	    		$sql2 = "UPDATE chat
	    		         SET opened = ?
	    		         WHERE chat_id = ?";
	    		$stmt2 = $con->prepare($sql2);
	            $stmt2->execute([$opened, $chat_id]);


                $id_3  = $_SESSION['userid'];
                $id_4  = $_POST['id_2'];
                $st = $con->prepare("SELECT *,users.imgg as imgg  FROM chat
                INNER JOIN users ON users.id  = chat.to_id
                WHERE to_id = ?
                AND   from_id= ?");
                $st->execute([$id_4,$id_3]);
                $row = $st->fetch();
	            ?>   
                <div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
                                    <?=$chat['message']?>
									<span class="msg_time_send"><?=$chat['created_at']?></span>
								</div>
								<div class="img_cont_msg">
								<img  src="layot/img/<?=$row['imgg']?>" class="rounded-circle user_img_msg">
								</div>
				</div>
	            <?php
	    	}
	    }
	}

 }

}else {
	header("Location: index.php");
	exit;
}
?>