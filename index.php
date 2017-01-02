<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
    <title>國立中央大學 - 研究發展處 企劃組</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- loader css -->
    <link rel="stylesheet" href="css/loaders.css" />
    <!-- bootstrap css-->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
    <!--bootstrap js-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- <script src="js/skel.min.js"></script> -->
    <script src="js/skel-panels.min.js"></script>
    <script src="js/init.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- 引入firebase -->
    <script type ="text/javascript" src="js/firebase.js"></script>
    <!-- 引入Angular JS -->
    <script type ="text/javascript" src="js/angular.min.js"></script>
    <script type ="text/javascript" src="js/angularfire.min.js"></script>
    <!-- app -->
    <script src="js/app.js"></script>
    <!-- style -->
    <link rel="stylesheet" href="css/style.css" />
 

</head>

<body class="indexPage" id="top" ng-controller="ScrollCtrl">

<!-- Navbar -->  
<ng-include src="'layouts/navbar.php'"></ng-include>    
  
<div class="container">
    <div ng-controller="dataController as dataC" ng-init="dataC.postBody=false;dataC.postLoad='styleLoad1';">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab" >所有公告</a></li>
            <li role="presentation" ><a href="#education" aria-controls="education" role="tab" data-toggle="tab" ng-click="dataC.click('高教資訊')">高教資訊</a></li>
            <li role="presentation"><a href="#technology" aria-controls="technology" role="tab" data-toggle="tab" ng-click="dataC.click('科技政策')">科技政策</a></li>
            <li role="presentation"><a href="#college" aria-controls="college" role="tab" data-toggle="tab" ng-click="dataC.click('大學櫥窗')">大學櫥窗</a></li>
            <li role="presentation"><a href="#highlight" aria-controls="highlight" role="tab" data-toggle="tab" ng-click="dataC.click('焦點評論')">焦點評論</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">

            <!-- 所有公告 -->
            <div role="tabpanel" class="tab-pane fade in active" id="all" ng-init="dataC.showData2();">
                <div class="col-md-8">
                    <!-- load view -->
                    <div id = "postLoad" class="loader">
                        <div style="background:#b60231;width:20%;float:left;">
                            <div class="loader-inner pacman" style="margin-left:3em;">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <div style="background:#b60231;width:30%;float:left;height:50px;display:block;padding-top:5px;text-align:right;">
                            <!-- <marquee scrollamount="15"><span style="margin-left:6em;color:white;font-weight:600;font-size:30px;">Loading</span></marquee> -->
                            <span id="load" style="margin-left:30%;color:white;font-weight:600;font-size:30px;">Loading</span>
                        </div>
                        <div style="padding-left:2%;background:#b60231;width:50%;float:left;height:50px;padding-top:17px;">
                            <div class="loader-inner ball-pulse">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <!-- complete view -->
                    <div id="postBody">
                        <section ng-repeat="detail in dataC.show | orderBy: '-time' | filter:search:strict | limitTo: dataC.paginationLimit2()">
                            <!-- postBox -->
                            <div class="postBox" data-toggle="modal" data-target="#ShowAll{{detail.$id}}" ng-init="myStyle=dataC.getLabelStyle(detail.type)" ng-click="dataC.clickCount(detail)">
                                <ng-include src="'layouts/postBox.php'"></ng-include> 
                            </div>
                            <!-- modal for Show -->
                            <div class="modal fade" id="ShowAll{{detail.$id}}" tabindex="-1" role="dialog">
                                <ng-include src="'layouts/modalShow.php'"></ng-include> 
                            </div>                        
                        </section>
                        <!-- pagination -->
                        <div class="pagination pagination-centered">
                            <button class="show-more-btn" ng-show="dataC.hasMoreItemsToShow2('all')" ng-click="dataC.showMoreItems2()">Show more</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 tools">
                    <!-- 搜尋 -->
                    <div class="searchArea
                                col-md-offset-2 col-md-8 col-md-offset-2
                                col-sm-offset-2 col-sm-8 col-sm-offset-2
                                col-xs-offset-2 col-xs-8 col-xs-offset-2">
                          <input type="text" class="form-control col-md-4" placeholder="搜尋標題" ng-model="search.subject">
                    </div>
                    <!-- 網站連結 -->
                    <ng-include src="'layouts/siteLinks.php'"></ng-include> 
                </div>  
            </div>

            <!-- 高教資訊 -->
            <div role="tabpanel" class="tab-pane fade" id="education" ng-init="dataC.showData2();">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show2 | orderBy:'-time' | filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox" data-toggle="modal" data-target="#Show{{detail.id}}" ng-init="myStyle=dataC.getLabelStyle(detail.type)">
                            <ng-include src="'layouts/postBox.php'"></ng-include> 
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show{{detail.id}}" tabindex="-1" role="dialog">
                          <ng-include src="'layouts/modalShow.php'"></ng-include> 
                        </div>                        
                    </section>
                    <div class="pagination pagination-centered">
                        <button class="show-more-btn" ng-show="dataC.hasMoreItemsToShow2()" ng-click="dataC.showMoreItems2()">Show more</button>
                    </div>
                </div>
                <div class="col-md-4 tools">
                    <!-- 搜尋 -->
                    <div class="searchArea col-md-offset-2 col-md-8 ">
                          <input type="text" class="form-control col-md-4" placeholder="搜尋標題" ng-model="search.subject">
                    </div>
                    <!-- 網站連結 -->
                    <ng-include src="'layouts/siteLinks.php'"></ng-include> 
                </div>
            </div>

            <!-- 科技政策 -->
           <div role="tabpanel" class="tab-pane fade" id="technology" ng-init="dataC.showData2();">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show2 | orderBy: '-time'| filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox" data-toggle="modal" data-target="#Show2{{detail.id}}" ng-init="myStyle=dataC.getLabelStyle(detail.type)">
                            <ng-include src="'layouts/postBox.php'"></ng-include> 
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show2{{detail.id}}" tabindex="-1" role="dialog">
                          <ng-include src="'layouts/modalShow.php'"></ng-include> 
                        </div>                        
                    </section>
                    <div class="pagination pagination-centered">
                        <button class="show-more-btn" ng-show="dataC.hasMoreItemsToShow2()" ng-click="dataC.showMoreItems2()">Show more</button>
                    </div>
                </div>
                <div class="col-md-4 tools">
                    <!-- 搜尋 -->
                    <div class="searchArea col-md-offset-2 col-md-8 ">
                          <input type="text" class="form-control col-md-4" placeholder="搜尋標題" ng-model="search.subject">
                    </div>
                    <!-- 網站連結 -->
                    <ng-include src="'layouts/siteLinks.php'"></ng-include> 
                </div>
            </div>

            <!-- 大學櫥窗 -->
           <div role="tabpanel" class="tab-pane fade" id="college" ng-init="dataC.showData2();">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show2 | orderBy: '-time' | filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox" data-toggle="modal" data-target="#Show3{{detail.id}}" ng-init="myStyle=dataC.getLabelStyle(detail.type)">
                            <ng-include src="'layouts/postBox.php'"></ng-include> 
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show3{{detail.id}}" tabindex="-1" role="dialog">
                          <ng-include src="'layouts/modalShow.php'"></ng-include> 
                        </div>                        
                    </section>
                    <div class="pagination pagination-centered">
                        <button class="show-more-btn" ng-show="dataC.hasMoreItemsToShow2()" ng-click="dataC.showMoreItems2()">Show more</button>
                    </div>
                </div>
                <div class="col-md-4 tools">
                    <!-- 搜尋 -->
                    <div class="searchArea col-md-offset-2 col-md-8 ">
                          <input type="text" class="form-control col-md-4" placeholder="搜尋標題" ng-model="search.subject">
                    </div>
                    <!-- 網站連結 -->
                    <ng-include src="'layouts/siteLinks.php'"></ng-include> 
                </div>
                
            </div>

            <!-- 焦點評論 -->
           <div role="tabpanel" class="tab-pane fade" id="highlight" ng-init="dataC.showData2();">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show2 | orderBy: '-time' | filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox" data-toggle="modal" data-target="#Show4{{detail.id}}" ng-init="myStyle=dataC.getLabelStyle(detail.type)">
                            <ng-include src="'layouts/postBox.php'"></ng-include> 
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show4{{detail.id}}" tabindex="-1" role="dialog">
                          <ng-include src="'layouts/modalShow.php'"></ng-include> 
                        </div>                        
                    </section>
                    <div class="pagination pagination-centered">
                        <button class="show-more-btn" ng-show="dataC.hasMoreItemsToShow2()" ng-click="dataC.showMoreItems2()">Show more</button>
                    </div>
                </div>
                <div class="col-md-4 tools">
                    <!-- 搜尋 -->
                    <div class="searchArea col-md-offset-2 col-md-8 ">
                          <input type="text" class="form-control col-md-4" placeholder="搜尋標題" ng-model="search.subject">
                    </div>
                    <!-- 網站連結 -->
                    <ng-include src="'layouts/siteLinks.php'"></ng-include>                   
                </div>
            </div>
            

        </div>

        <div class="fixed">
            <button type="button" class="btn btn-info btn-circle btn-lg" ng-click="gotoElement('top')"><i class="glyphicon glyphicon-chevron-up"></i></button>
        </div>

        <!-- Loading轉圈圈 -->
        <script type="text/javascript">
            setTimeout(function() {
                document.getElementById('postLoad').style.display='none';
            },2300);
        </script>

    </div>

</div>

<!-- Footer -->  
<ng-include src="'layouts/footer.php'"></ng-include>

</body>
</html>

