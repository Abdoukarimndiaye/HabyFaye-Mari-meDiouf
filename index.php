<?php
session_start();

if(!$_SESSION['pass'] AND !$_SESSION['user'] ){
	 header('Location: Admin/login.php');
}
include('./asset/header.php');
include('./asset/nav.php');
include('./asset/footer.php');