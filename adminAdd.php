<!DOCTYPE HTML>
<html ng-app="myApp">
<head>
	<title>企劃組網站管理介面</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-theme.css" />
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
	<!-- ckeditor -->
	<script type ="text/javascript" src="ckeditor/ckeditor.js"></script>
	<!-- 引入firebase -->
	<script type ="text/javascript" src="js/firebase.js"></script>
	<!-- 引入Angular JS -->
	<script type ="text/javascript" src="js/angular.min.js"></script>
	<script type ="text/javascript" src="js/angularfire.min.js"></script>
	<!-- app -->
	<script src="js/app.js"></script>
	<noscript>
		<!-- style -->
		<link rel="stylesheet" href="css/style.css" />
	</noscript>
	
	<?php 
		// 開啟session
		session_start();
		// 登入登出--------------------------------------------
		 	// 若非登入狀態 返回登入頁面 
			if(!isset($_COOKIE["login"])){
				header("Location: login.php");
			}
			// 登出
			if(isset($_GET["logout"])){
				header("Location: login.php");
			}
		// 錯誤資訊--------------------------------------------
			// if(isset($_POST["postTitle"])){
			// 	$Title = $_POST["postTitle"];
			// 	$Type = $_POST["postType"];
			// 	$Source = $_POST["postSource"];
			// 	$SourceURL = $_POST["postSourceURL"];
			// 	$Content = $_POST["postContent"];

			// 	if($Title==""||$Type==""||$Source==""||$sourceURL==""||$Content==""){
			// 		$_SESSION['FormError'] = "true";
			// 	}
			// }
	?>

</head>
<body class="adminPage">

	<!-- nav bar -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

	    	<div class="navbar-header">
	            <a href="admin.php" class="navbar-brand">管理首頁</a>
	            <a href="index.php" class="navbar-brand">電子報首頁</a>
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

	<!-- 錯誤資訊 -->
	<?php if(isset($_SESSION['FormError'])): ?>
		<div class="alert alert-danger alert-dismissable text-center">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    錯誤：
		    <?php
		    echo "格式錯誤，所有欄位皆應填寫";
		    // switch($_SESSION['FormError']){
		    //     case 'Without_Title':	echo "未填標題欄";    break;
		    //     case 'Without_Type':	echo "未選擇分類";    break;
		    //     case 'Without_Source':	echo "未貼上來源";    break;
		    //     case 'Without_SourceURL':	echo "未貼上來源連結";    break;
		    //     case 'Without_Content':	echo "請填寫內容欄";    break;
		    // }
		    unset($_SESSION['FormError']);
		    ?>
		</div>
	<?php endif ?>

	<!-- 主題 -->
	<h1 class="title text-center">新增公告</h1>
	<hr>

	<!-- 內容 -->
	<div class="col-md-offset-3 col-md-6" ng-controller="dataController as dataC">
		<!-- 表單 -->
		<form id="addPostForm" role="form" method="post" action="">
	        <div class="form-group col-md-8">
	            <label for="postTitle">標題</label>
	            <input type="text" class="form-control" id="postTitle" name="postTitle" placeholder="標題" ng-model="postTemp.subject">
	        </div>
	        <div class="form-group col-md-4">
	            <label for="postType">公告分類</label>
	            <select class="form-control" name="postType" ng-model="postTemp.type">
	                <option>高教資訊</option>
	                <option>科技政策</option>
	                <option>大學櫥窗</option>
	                <option>焦點評論</option>
	            </select>
	        </div>
	        <div class="form-group col-md-8">
	            <label for="postTitle">來源</label>
	            <input type="text" class="form-control" id="postSource" name="postSource" placeholder="來源" ng-model="postTemp.source">
	        </div>
	        <div class="form-group col-md-4">
	            <label for="postTitle">來源連結</label>
	            <input type="text" class="form-control" id="postSourceURL" name="postSourceURL" placeholder="來源連結" ng-model="postTemp.sourceURL">
	        </div>
	        <div class="form-group col-md-12">
	            <label for="postContent">內容</label>
	            <textarea ckeditor class="form-control" name="postContent" id="postContent" rows="15" ng-model="postTemp.content"></textarea>

	        </div>

	        <!-- 提示訊息 -->
	        <div class="form-group col-md-12">
            	<div class="alert alert-info">
	                <ul>
	                    <li>所有欄位都皆須輸入</li>
                	</ul>
            	</div>
        	</div>

        	<!-- btn -->
	         <div class="form-group text-center">
	            <a href="admin.php"><button type="button" class="btn btn-default">返回</button></a>
	            <button type="reset" class="btn btn-warning" ng-click="postTemp={}">重設</button>
	            <button type="submit" class="btn btn-primary" ng-click="dataC.addpost(postTemp); postTemp={}; ">新增</button>
        	</div>

	    </form>

	</div>
	




	<!-- bootstrap js -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/bootstrap.js"></script>
		
</body>
</html>