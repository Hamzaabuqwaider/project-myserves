<?php 
function checkCat($type){
    global $con;

    $statment = $con->prepare("SELECT title_cat FROM main_categories where type = '$type'");
    $statment->execute();
    $main_cat = $statment->fetchAll();

    return $main_cat;
}

function ConfirmDelete()
{
  return confirm("Are you sure you want to delete?");
}

function redirectHome($location){
    header("refresh:0;$location");
    exit();
}

function countItems($item, $table) {

    global $con;

    $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

    $stmt2->execute();

    return $stmt2->fetchColumn();

}

function getCat() {
    global $con;
    $getCat= $con->prepare("SELECT * FROM post");
    $getCat->execute();
    $catId= $getCat->fetchAll();
    return $catId;  
}

function checkItem($select, $from, $value){
    global $con;

    $stmt = $con->prepare("SELECT $select FROM $from where $select = ?");
    $stmt->execute(array($value));
    $count = $stmt->rowCount();

    return $count;
}

function login($username,$password)
    {
        global $con;
        $get_user="select * from `users` WHERE name ='$username' and password='$password'";
        $run_user = $con->query($get_user);
        $state_user = $run_user->rowCount();
        if($state_user >0){
            $row_data = $run_user->fetch();
            $_SESSION['usertype']=$row_data['type'];
            $_SESSION['userid']=$row_data['id'];
            $_SESSION['username']=$row_data['name'];
            header('location: mainpage.php');

        }else
        {
            echo '<script>alert("عذراً يرجى ادخال معلومات صحيحه")</script>';
        }
    
    }

    function CheckReg($select, $from, $value){
        global $con;
    
        $statment = $con->prepare("SELECT $select FROM $from where $select = ?");
        $statment->execute(array($value));
        $count = $statment->rowCount();
    
        return $count;
    }

    function getUser($username, $con){
        $sql = "SELECT * FROM users 
                WHERE id=?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$username]);
     
        if ($stmt->rowCount() === 1) {
             $user = $stmt->fetch();
             return $user;
        }else {
            $user = [];
            return $user;
        }
     }

    function getChats($id_1, $id_2, $con){
    
    $sql = "SELECT * FROM chat
            WHERE from_id=? AND to_id=?
            OR to_id=? AND from_id=?
            ORDER BY chat_id ASC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$id_1, $id_2,$id_1,$id_2]);

        if ($stmt->rowCount() > 0) {
            $chats = $stmt->fetchAll();
            return $chats;
        }else {
            $chats = [];
            return $chats;
        }

    }


    function opened($id_1, $con, $chats){
        foreach ($chats as $chat) {
            if ($chat['opened'] == 0) {
                $opened = 1;
                $chat_id = $chat['chat_id'];
    
                $sql = "UPDATE chat
                        SET   opened = ?
                        WHERE from_id=? 
                        AND   chat_id = ?";
                $stmt = $con->prepare($sql);
                $stmt->execute([$opened, $id_1, $chat_id]);
    
            }
        }
    }

    function lastChat($id_1, $id_2, $con){
   
        $sql = "SELECT * FROM chat
                WHERE (from_id=? AND to_id=?)
                OR    (to_id=? AND from_id=?)
                ORDER BY chat_id DESC LIMIT 1";
         $stmt = $con->prepare($sql);
         $stmt->execute([$id_1, $id_2, $id_1, $id_2]);
     
         if ($stmt->rowCount() > 0) {
             $chat = $stmt->fetch();
             return $chat['message'];
         }else {
             $chat = '';
             return $chat;
         }
     
     }

     define('TIMEZONE', 'Asia/Amman');
    date_default_timezone_set(TIMEZONE);

    function last_seen($date_time){

    $timestamp = strtotime($date_time);	
    
    $strTime = array("second", "minute", "hour", "day", "month", "year");
    $length = array("60","60","24","30","12","10");

    $currentTime = time();
    if($currentTime >= $timestamp) {
            $diff     = time()- $timestamp;
            for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
            $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            if ($diff < 59 && $strTime[$i] == "second") {
                return 'Active';
            }else {
                return $diff . " " . $strTime[$i] . "(s) ago ";
            }
            
    }
    }
  




    



