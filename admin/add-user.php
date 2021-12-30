<?php 
session_start();
include ("include/header-admin.php");
include ("../include/connect.php");
include ("../include/function.php");

if(isset($_SESSION['admin'])){

    $do = isset($_GET['do']) ? $_GET['do'] : "Manage";