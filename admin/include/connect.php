<?php 
$db ='mysql:host=localhost;dbname=khidma';//data source name
$user='root';// the user to connect
$pass = '';// password of this user
$option =array (
 PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8',
);

try {
    $con = new PDO($db,$user,$pass,$option);//start new connection with bdo class
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo " You Are Connectd Welcome To Database";

}
catch (PDOExeception $e){
    echo "Failed To Connected" . $e->getMessage();
}