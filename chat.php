<?php 
$titlePage = "chat";
ob_start();
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include ("include/function.php");
include('include/loding.php');


if (isset($_SESSION['userid']))
{
    $name = isset($_GET['user_id']) && is_numeric($_GET['user_id']) ? intval($_GET['user_id']) :0;
    $post = isset($_GET['post']) && is_numeric($_GET['post']) ? intval($_GET['post']) :0;

    $getUser = $con->prepare("SELECT * FROM users WHERE id = '$post' ");
    $getUser->execute();
    $row = $getUser->fetch();

  	if (!isset($_GET['post'])) {
  		header("Location: index.php");
  		exit;  
  	}

  	# Getting User data data
  	$chatWith = getUser($row['id'], $con);

	  

  	$chats = getChats($_SESSION['userid'], $row['id'], $con);

  	opened($row['id'], $con, $chats);
?>
<div class="main-caht">
    <div>
			<div class="row justify-content-center ">
				<div class="col-md-9 col-xl-9 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								
								<?php
                        if (last_seen($row['last_seen']) == "Active") {
							?>
							<div class="img_cont">
								<img src="layot/img/<?=$row['imgg']?>" class="rounded-circle user_img">
									<span class="online_icon"></span>
							</div>
								<div class="user_info">
                                    &nbsp;&nbsp;&nbsp;<span> <?=$row['name']?></span>
								</div>
							<?php  }else{ ?>
								<div class="img_cont">
								<img src="layot/img/<?=$row['imgg']?>" class="rounded-circle user_img">
									<span class="online_icon_tow"></span>
								</div>
								<div class="user_info">
                                    &nbsp;&nbsp;&nbsp;<span> <?=$row['name']?></span>
								</div>
								<small class="d-block  tiem-zone">
									Last seen:
									<?=last_seen($row['last_seen'])?>
								</small>
							<?php  } ?>
								
							</div>
                            <div class="exit_info">
                                   <abbr title="رجوع الى الصفحه"><a href="index.php"><i class="fas fa-sign-out-alt"></i></a> </abbr> 
							</div>
						</div>
						<div class="card-body msg_card_body" id="chatBox">
                            <?php 
                        if (!empty($chats)) {
                        foreach($chats as $chat){
                            if($chat['from_id'] == $_SESSION['userid'])
                            { ?>
							<div class="d-flex justify-content-start mb-4">
								<div class="img_cont_msg">
									<img   src="layot/img/<?=$chat['IMG']?>" class="rounded-circle user_img_msg">
								</div>
								<div class="msg_cotainer">
                                    <?=$chat['message']?>
									<span class="msg_time"><?=$chat['created_at']?></span>
								</div>
							</div>
                            <?php }else{ ?>
							<div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
                                    <?=$chat['message']?>
									<span class="msg_time_send"><?=$chat['created_at']?></span>
								</div>
								<div class="img_cont_msg">
								<img src="layot/img/<?=$chat['IMG']?>"class="rounded-circle user_img_msg">
								</div>
							</div>
                            <?php } 
                                }	
                            }else{ ?>
                        <div class="alert alert-info 
                                            text-center">
                            <i class="fa fa-comments d-block fs-big"></i>
                            No messages yet, Start the conversation
                        </div>
                        <?php } ?>
						</div>
						<div class="card-footer">
							<div class="input-group">
								<textarea id="message" name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append">
									<span class="input-group-text "><i  id="sendBtn" class="fas fa-location-arrow"></i></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>

<?php include ("include/footer.php");?>

<script>
	var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
	}

	scrollDown();

	$(document).ready(function(){
      
      $("#sendBtn").click(function(){
		  console.log("Hello");
      	message = $("#message").val();
      	if (message == "") return;

      	$.post("insert.php",
      		   {
      		   	message: message,
      		   	to_id: <?=$chatWith['id']?>
      		   },
      		   function(data, status){
                  $("#message").val("");
                  $("#chatBox").append(data);
                  scrollDown();
      		   });
      });

      /** 
      auto update last seen 
      for logged in user
      **/
      let lastSeenUpdate = function(){
      	$.get("update_last_seen.php");
      }
      lastSeenUpdate();
      /** 
      auto update last seen 
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);



      // auto refresh / reload
      let fechData = function(){
      	$.post("getMessage.php", 
      		   {
      		   	id_2: <?=$chatWith['id']?>
      		   },
      		   function(data, status){
                  $("#chatBox").append(data);
                  if (data != "") scrollDown();
      		    });
      }

      fechData();
      /** 
      auto update last seen 
      every 0.5 sec
      **/
      setInterval(fechData, 500);
    
    });
</script>
<?php
  }else{
	header('Location: main-login.php');
	exit;
  }
  ob_end_flush();
 ?>
