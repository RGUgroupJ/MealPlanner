<?php 
session_start();
session_destroy();
header('Location: planner.php');
exit;
?>