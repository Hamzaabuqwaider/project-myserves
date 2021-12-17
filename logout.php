<?php 

 session_start();   // Start The Session
 session_unset();  // Unset the data
 session_destroy(); // Destroy the session
 header('Location: main-login.php');
 exit();