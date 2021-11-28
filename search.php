<?php

if(isset($_GET["query"]))
{
    include('include/connect.php');
    $output='';
    $search = $_GET["query"];
    $stmt = $con->prepare("SELECT * FROM post WHERE title LIKE '%".$search."%'");
    $stmt->execute();
    $row = $stmt->fetchAll();
    $count =$stmt->rowCount();
    $output= '<ul class="list-unstyled">';

    if($count > 0)
    {
        foreach($row as $rows)
        {
            $output .= '<li><a href="section.php?Cat_id='.$rows["category_id"].'">' . $rows["title"] . '</a></li><hr>';
        }
    } else{

        $output .= '<li>خدمة غير موجودة</li>';
    }
    echo $output;
    $output.='</ul>';
}

?>