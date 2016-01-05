<?php 
session_start();
session_destroy();
header("location:http://".$_SERVER['SERVER_NAME']);
?>