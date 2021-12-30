
<?php
include ('include/connect.php');
include ("include/session.php");

if(isset($_GET['main_selector']) && !empty($_GET['main_selector']))
    {

        
        
    $subName = $_GET['main_selector'];
    $stmt = $con->prepare("SELECT *, sub_category.id as sub_id 
                           FROM sub_category 
                           INNER JOIN main_categories 
                           ON main_categories.id = sub_category.parent_id 
                           WHERE main_categories.title_cat = ?");
    $stmt->execute(array($subName));
    $row = $stmt->fetchAll();
    $html = '';
    foreach($row as $rows) {
        $html .= '<option value="' .$rows['sub_id'].'">'.$rows['Name'];

    }
    echo $html;
    // echo json_encode($row , JSON_PREITY_PRINT);
    }else {
        echo '<h1> Error </h1>';
    }
    
    

if(isset($_POST["number_Star"]) && isset($_POST['craft_Id'])) {
    
    $status = [];
    $stmt = $con->prepare("SELECT * FROM rating WHERE post_id = ? AND user_id = ?");
    $stmt->execute([$_POST['craft_Id'], $_SESSION['userid']]);
    $ratings = $stmt->fetch();
    if(!empty($ratings)){
        $stmt2 = $con->prepare("UPDATE rating SET number_rating = ? WHERE post_id = ? AND user_id = ?");
        $result = $stmt2->execute([$_POST['number_Star'], $_POST['craft_Id'], $_SESSION['userid']]);
        if($result == true){
            $status["status"] = 0;
            $status["message"] = "success";
        }
    }else{
        $stmt2 = $con->prepare("INSERT INTO rating SET post_id = ?, user_id = ?, number_rating = ?");
        $result = $stmt2->execute([$_POST['craft_Id'], $_SESSION['userid'], $_POST['number_Star']]);
        if($result == true){
            $status["status"] = 1;
            $status["message"] = "success";
        }
    }
    echo json_encode($status);
}
?>