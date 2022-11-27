<?php 
ob_start();
session_start();
include "inc/db.php";
  
if(empty($_SESSION['email']) && empty($_SESSION['user_id'])){
    header("Location:index.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Library Online</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
  <!--uploader plugin start -->
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link href="assets/css/jquery.mn-file.css" rel="stylesheet" type="text/css">
	<style>

	.previewContainer{text-align: center; margin-top:30px;}
	.previewContainer img {border: 5px solid #e87474; box-shadow: 0 0 3px -1px rgba(0, 0, 0, 0.8); max-height: 100px;}
	</style>
  <!--uploader plugin end -->
	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">
	<!-- tags input -->
  <link rel="stylesheet" type="text/css" href="assets/css/tagsinput.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body data-background-color="dark">
	<div class="wrapper">