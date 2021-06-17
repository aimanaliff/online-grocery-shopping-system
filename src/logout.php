<?php 
session_start();
session_unset();
session_destroy();
$_SESSION['success']=false;
header('Location: index.php');

exit;

?>