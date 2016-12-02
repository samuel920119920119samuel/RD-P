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

		// 登入登出--------------------------------------------
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


	<!-- 主題 -->
	<h1 class="title text-center">公告管理</h1>
	<hr>

	<!-- 內容 -->
	<div class="col-md-offset-2 col-md-8" ng-controller="dataController as dataC">
	    <table class="table table-hover" ng-init="dataC.showData(); dataC.order=true;">

	    	<!-- 時間排序 -->
	    	<div class="text-center">
		    	<button class="btn btn-primary btn-order" ng-click="dataC.order=true">由新到舊</button>
		    	<button class="btn btn-primary btn-order" ng-click="dataC.order=false">由舊到新</button>
		    </div>
		    <!-- 搜尋 -->
	    	<div class="searchArea col-md-offset-4 col-md-4 ">
	            <input type="text" class="form-control col-md-4" placeholder="搜尋標題" ng-model="search.subject">
		    </div>

		 
	    	<!-- head -->
	        <thead>
	            <tr>
	                <th class="col-md-2 text-center">
	                    分類
	                </th>
	                <th class="col-md-4 text-center">
	                    公告標題
	                </th>
	                <th class="col-md-4 text-center">
	                    公告時間
	                </th>
	                <th class="col-md-2 text-center">
	                	工具
	                </th>
	            </tr>
	        </thead>
	        <!-- body -->
	        <tbody>
	            <tr ng-repeat="detail in dataC.show| orderBy: dataC.orderGet() |limitTo: dataC.paginationLimit() : dataC.getStart() | filter:search:strict">
	            	<!-- 分類 -->
	                <td  class="text-center" ng-bind="detail.type">
	                </td>
	            	<!-- 公告標題 -->
	                <td ng-bind="detail.subject">
	                </td >
	            	<!-- 公告時間 -->
	                <td class="text-center" ng-bind="detail.time">
	                </td>
	                <!--  工具: 瀏覽 編輯 刪除 -->
	                <td>
						<a href="" data-toggle="modal" data-target="#View{{detail.$id}}" ng-cilck="dataC.test()"><span class="glyphicon glyphicon-eye-open"></span></a>
	                    <a href="" data-toggle="modal" data-target="#Edit{{detail.$id}}"><span class="glyphicon glyphicon-pencil"></span></a>
	                    <a href="" ng-click="dataC.deletePost(detail)"><span class="glyphicon glyphicon-trash"></span></a>

                    	<!-- modal for 瀏覽 -->
						<div class="modal fade" id="View{{detail.$id}}" tabindex="-1" role="dialog">
							<div class="modal-dialog modal-lg">
							    <div class="modal-content">
							        <div class="modal-header">
							            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							            <h1 class="modal-title text-center" id="myModalLabel">瀏覽公告</h1>
							        </div>
							        <div class="modal-body" id="viewModal" >

							            <label for="postTitle">標題</label>
							            <p class="show">{{detail.subject}}</p>

							            <label for="postType">公告分類</label>
							            <p class="show">{{detail.type}}</p>

							            <label for="postTitle">來源</label>
							            <p class="show">{{detail.source}}</p>

							            <label for="postContent">內容</label>
							            <!-- <p class="showContent">{{detail.content}}</p> -->
							            <div>{{detail.content}} </div>


							            <label for="postTitle">來源連結</label>
							           	<a href="{{detail.sourceURL}}" target="_blank" class="show">{{detail.sourceURL}}</a>

							      	</div>
							      	<div class="modal-footer">
							            <button type="submit" class="btn btn-primary" data-dismiss="modal">返回</button>
							      	</div>
							    </div>
						    </div>
						</div>

                    	<!-- modal for 編輯 -->
						<div class="modal fade" id="Edit{{detail.$id}}" tabindex="-1" role="dialog" >
							<div class="modal-dialog modal-lg">
							    <div class="modal-content">
							        <div class="modal-header">
							            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							            <h1 class="modal-title text-center" id="myModalLabel">編輯公告</h1>
							        </div>
							        <div class="modal-body" id="editPostForm">
							        	<!-- 表單 -->
								        <div class="form-group col-md-8">
								            <label for="postTitle">標題</label>
								            <input type="text" class="form-control" id="postTitle" name="postTitle" placeholder="標題" ng-model="detail.subject">
								        </div>
								        <div class="form-group col-md-4">
								            <label for="postType">公告分類</label>
								            <select class="form-control" name="postType" ng-model="detail.type">
								                <option>高教資訊</option>
								                <option>科技政策</option>
								                <option>大學櫥窗</option>
								                <option>焦點評論</option>
								            </select>
								        </div>
								        <div class="form-group col-md-8">
								            <label for="postTitle">來源</label>
								            <input type="text" class="form-control" id="postSource" name="postSource" placeholder="來源" ng-model="detail.source">
								        </div>
								        <div class="form-group col-md-4">
								            <label for="postTitle">來源連結</label>
								            <input type="text" class="form-control" id="postSourceURL" name="postSourceURL" placeholder="來源連結" ng-model="detail.sourceURL">
								        </div>
								        <div class="form-group col-md-12">
								            <label for="postContent">內容</label>
								            <textarea class="form-control" name="postContent" id="postContent" rows="15" ng-model="detail.content"></textarea>
								        </div>
							      	</div>
							      	<div class="modal-footer">
							            <button type="submit" class="btn btn-primary" ng-click="dataC.saveEdit(detail);" data-dismiss="modal">確認</button>
							      	</div>
							    </div>
						    </div>
						</div>
	                </td>
	               
	            </tr>
	        </tbody>
	    </table>
	</div>
		<div class="pagination pagination-centered">
			<button class="show-more-btn" ng-show="dataC.hasMoreItemsToShow()" ng-click="dataC.showMoreItems()">MORE</button>
		</div>
	
 		
	<!-- bootstrap js -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/bootstrap.js"></script>
		
</body>
</html>