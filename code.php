<?php
session_start();
$con = mysqli_connect("localhost" , "root" ,"","khidma");
;
if(isset($_POST['add_subreplies']))
{
     //$comt_id = isset($_GET['loac']) && is_numeric($_GET['loac']) ? intval($_GET['loac']) :0;

    $cmt_id = mysqli_real_escape_string($con, $_POST['cmt_id']);
    $reply_msg = mysqli_real_escape_string($con, $_POST['reply_msg']);

    $user_id = $_SESSION['userid'];

    $query ="INSERT INTO comment_replies (user_id , comt_id, reply_msg) VALUES ('$user_id','$cmt_id','$reply_msg') ";

    $query_run = mysqli_query($con,$query);

    if($query_run)
    {

        echo "comment Replied ";

    }else {

        echo "Something Went Wrong ";

    }
    
}

if(isset($_POST['view_comment_data']))
{
    $cmt_id = mysqli_real_escape_string($con,$_POST['cmt_id']);

    $query = "SELECT * FROM comment_replies WHERE  comt_id = '$cmt_id' ";
    $query_run = mysqli_query($con,$query);

    $result_array = [];

    if(mysqli_num_rows($query_run) > 0)
    {
        
        foreach($query_run as $row)
        {
            $user_id = $row['user_id'];
            $user_query = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1 ";
            $user_query_run = mysqli_query($con, $user_query);
            $user_result = mysqli_fetch_array($user_query_run);

            

            array_push($result_array, ['cmt'=>$row, 'user'=>$user_result]);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);

    }else{
        echo "No replied to this user";
    }
}


if(isset($_POST['reply_add_btn']))
{

    $cmt_id = mysqli_real_escape_string($con, $_POST['comt_id']);
    $replay = mysqli_real_escape_string($con, $_POST['reply_msg']);
    
    var_dump($cmt_id);
    var_dump($replay);
    
    $user_id = $_SESSION['userid'];

    $query ="INSERT INTO comment_replies (user_id , comt_id, reply_msg) VALUES ('$user_id','$cmt_id','$replay')";

    $query_run = mysqli_query($con,$query);

}


if(isset($_POST['comment_load_data']))
{
    $postId = mysqli_real_escape_string($con, $_POST['postId']);

    $comments_query = "SELECT * FROM comment WHERE post_id = '$postId' ORDER BY comment_id DESC" ;
    $comments_query_run = mysqli_query($con,$comments_query);

    $array_result = [];

    if(mysqli_num_rows($comments_query_run) > 0)
    {
        
        foreach($comments_query_run as $row)
        {
            $user_id = $row['comment_user'];
            $user_query = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1 ";
            $user_query_run = mysqli_query($con, $user_query);
            $user_result = mysqli_fetch_array($user_query_run);

            array_push($array_result, ['cmt'=>$row, 'user'=>$user_result]);
        }
        header('Content-type: application/json');
        echo json_encode($array_result);

    }else{
        echo "Give a comment";
    }
}

if(isset($_POST['add_comnment']))
{
    $msg = mysqli_real_escape_string($con, $_POST['msg']);
    $postId = mysqli_real_escape_string($con, $_POST['postId']);


    $user_id = $_SESSION['userid'];


    $comment_add_query = "INSERT INTO comment (comment_user,comment,post_id)VALUES('$user_id' ,'$msg', '$postId')";
    $comment_add_query_run = mysqli_query($con,$comment_add_query);
    
    if($comment_add_query_run)
    {
        echo "Comment Add Successfully";

    }else{
        
        echo "Comment not added .! Something wert wrong";
    }
}

?>