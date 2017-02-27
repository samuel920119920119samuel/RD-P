<!DOCTYPE HTML>
<html>
<head>
	<title>企劃組網站管理首頁</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-theme.css" />
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
	<noscript>
		<!-- style -->
		<link rel="stylesheet" href="css/style.css" />
	</noscript>

	
	<?php 
	 	// 若非登入狀態 返回登入頁面 
		if(!isset($_COOKIE["login"])){
			header("Location: login.php");
		}
		// 登出
		if(isset($_GET["logout"])){
			header("Location: login.php");
		}
	?>

</head>
<body class="adminPage">
	<!-- nav bar -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

	    	<div class="navbar-header">
	            <a href="admin.php" class="navbar-brand">管理首頁</a>
	        </div>
	        <div class="collapse navbar-collapse" id="com">
	            <ul class="nav navbar-nav navbar-right">
					<li><a href="adminList.php" class="navbar-link">公告管理</a></li>
					<li><a href="adminAdd.php" class="navbar-link">新增公告</a></li>
					<li><a href="admin.php?logout" class="navbar-link">登出</a></li>
					<li></li>
	            </ul>
        	</div>

	</nav>
	<!-- 標題與圖片 --> 
	<h1 class="text-center">中央大學研發處企劃組管理介面</h1>
	<img src="image/home.png" class="img-rounded img-responsive" alt="Responsive image">




	<!-- bootstrap js -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/bootstrap.js"></script>
		
</body>
</html>