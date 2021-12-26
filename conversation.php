<?php 

function getConversation($user_id, $con){
    /**
 
    **/
    $sql = "SELECT * FROM conversation
            WHERE user_1=? OR user_2=?
            ORDER BY conversation_id DESC";

    $stmt = $con->prepare($sql);
    $stmt->execute([$user_id, $user_id]);

    if($stmt->rowCount() > 0){
        $conversations = $stmt->fetchAll();

        /**

        **/
        $user_data = [];
        
        # looping through the conversations
        foreach($conversations as $conversation){
            # if conversations user_1 row equal to user_id
            if ($conversation['user_1'] == $user_id) {
            	$sql2  = "SELECT *
            	          FROM users WHERE id=?";
            	$stmt2 = $con->prepare($sql2);
            	$stmt2->execute([$conversation['user_2']]);
            }else {
            	$sql2  = "SELECT *
            	            FROM users WHERE id=?";
            	$stmt2 = $con->prepare($sql2);
            	$stmt2->execute([$conversation['user_1']]);
            }

            $allConversations = $stmt2->fetchAll();

            # pushing the data into the array 
            array_push($user_data, $allConversations[0]);
        }

        return $user_data;

    }else {
    	$conversations = [];
    	return $conversations;
    }  

}
?>