
<?php
error_reporting(0);
session_start();
if($_SESSION['login']==0){

    if(isset($_GET['page'])){
        require 'pages/reg.php';
    } else {
        require 'pages/login.php';
    }
}
if($_SESSION['login']==1){

require 'pages/header.php';

if(isset($_GET['page'])){
    require 'pages/'.$_GET['page'].'.php';
} else {
    require 'pages/main.php';
}
require 'pages/footer.php';
}
?>
