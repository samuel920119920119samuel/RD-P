<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
    <title>國立中央大學 - 研究發展處 企劃組</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<body class="indexPage"  ng-controller="dataController as dataC">

<!-- Navbar -->  
<ng-include src="'layouts/navbar.php'"></ng-include>    
  
<div class="container">
    <div >
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
                    <section ng-repeat="detail in dataC.show | orderBy: '-time' | filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox" data-toggle="modal" data-target="#ShowAll{{detail.$id}}">
                            <p class="viewTitle" ><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>&nbsp;&nbsp;{{detail.subject}}</p>
                            <p class="viewSource" ng-bind="detail.source"></p>
                            <p class="viewContent" ng-bind-html="detail.content| cut:true:108:'...'|trustHtml"></p>
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="ShowAll{{detail.$id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                  <div class="modal-body" id="ShowModal" >
                                      <!-- x -->
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <!-- 標題 -->
                                      <h1 class="modal-title text-center" id="myModalLabel">{{detail.subject}}</h1>
                                      <!-- 公告分類 -->
                                      <span class="label label-info">{{detail.type}}</span>
                                      <br><br>
                                      <!-- 來源 -->
                                      <p class="showSource">{{detail.source}}</p>

                                      <!-- 內容 -->
                                      <p class="showContent" ng-bind-html="detail.content|trustHtml"></p>

                                      <hr><label for="postTitle" class="sourceURL">&nbsp;來源連結</label><br>
                                      <a href="{{detail.sourceURL}}">{{detail.sourceURL}}</a>

                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary" data-dismiss="modal">返回</button>
                                  </div>
                              </div>
                            </div>
                        </div>                        
                    </section>
                    <div class="pagination pagination-centered">
                        <button class="show-more-btn" ng-show="dataC.hasMoreItemsToShow2('all')" ng-click="dataC.showMoreItems2()">Show more</button>
                    </div>
                </div>
                <div class="col-md-4 tools">
                    <!-- 搜尋 -->
                    <div class="searchArea col-md-offset-2 col-md-8 col-md-offset-2">
                          <input type="text" class="form-control col-md-4" placeholder="搜尋標題" ng-model="search.subject">
                    </div>


                    <div class="btn-group-vertical col-md-offset-3 col-md-6 col-md-offset-3">
                      <p class="link">相關連結</p>
                      <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/AboutRDO/business.php#1">本組簡介</button>
                      <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/AboutRDO/member.php#2">成員及職掌</button>
                      <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Files/%E4%BC%81%E5%8A%83%E7%B5%84FAQ(103%E5%B9%B4%E7%89%88).docx">校務發展計畫</button>
                      <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/record.php">校務發展委員會議</button>
                      <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/newCampus.php">八德校地籌設</button>
                      <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/self_evaluation/update.php">校務評鑑</button>
                      <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/integrationGuide.php">教育部統合視導</button>
                    </div>
                </div>  
            </div>

            <!-- 高教資訊 -->
            <div role="tabpanel" class="tab-pane fade" id="education" ng-init="dataC.showData2();">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show2 | orderBy:'-time' | filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox" data-toggle="modal" data-target="#Show{{detail.id}}" ng-click="{{console.log(detail)}}" >
                            <p class="viewTitle" ><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>&nbsp;&nbsp;{{detail.subject}}</p>
                            <p class="viewSource" ng-bind="detail.source"></p>
                            <p class="viewContent" ng-bind-html="detail.content| cut:true:108:'...'|trustHtml"></p>
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show{{detail.id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-body" id="ShowModal" >
                                      <!-- x -->
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <!-- 標題 -->
                                      <h1 class="modal-title text-center" id="myModalLabel">{{detail.subject}}</h1>
                                      <!-- 公告分類 -->
                                      <span class="label label-info">{{detail.type}}</span>
                                      <br><br>
                                      <!-- 來源 -->
                                      <p class="showSource">{{detail.source}}</p>

                                      <!-- 內容 -->
                                      <p class="showContent" ng-bind-html="detail.content|trustHtml"></p>

                                      <hr><label for="postTitle" class="sourceURL">&nbsp;來源連結</label><br>
                                      <a href="{{detail.sourceURL}}" target="_blank" class="show">{{detail.sourceURL}}</a>

                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary" data-dismiss="modal">返回</button>
                                  </div>
                              </div>
                            </div>
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
                    <div class="btn-group-vertical col-md-offset-3 col-md-6 col-md-offset-3">
                        <p class="link">相關連結</p>
                        <button class="btn btn-default btn-sm" >本組簡介</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/AboutRDO/member.php#2">成員及職掌</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Files/%E4%BC%81%E5%8A%83%E7%B5%84FAQ(103%E5%B9%B4%E7%89%88).docx">校務發展計畫</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/record.php">校務發展委員會議</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/newCampus.php">八德校地籌設</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/self_evaluation/update.php">校務評鑑</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/integrationGuide.php">教育部統合視導</button>
                    </div>
                </div>
            </div>

            <!-- 科技政策 -->
           <div role="tabpanel" class="tab-pane fade" id="technology" ng-init="dataC.showData2();">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show2 | orderBy: '-time'| filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox" data-toggle="modal" data-target="#Show2{{detail.id}}" ng-click="console.log(detail)">
                            <p class="viewTitle" ><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>&nbsp;&nbsp;{{detail.subject}}</p>
                            <p class="viewSource" ng-bind="detail.source"></p>
                            <p class="viewContent" ng-bind-html="detail.content| cut:true:108:'...'|trustHtml"></p>
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show2{{detail.id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-body" id="ShowModal" >
                                      <!-- x -->
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <!-- 標題 -->
                                      <h1 class="modal-title text-center" id="myModalLabel">{{detail.subject}}</h1>
                                      <!-- 公告分類 -->
                                      <span class="label label-info">{{detail.type}}</span>
                                      <br><br>
                                      <!-- 來源 -->
                                      <p class="showSource">{{detail.source}}</p>

                                      <!-- 內容 -->
                                      <p class="showContent" ng-bind-html="detail.content|trustHtml"></p>

                                      <hr><label for="postTitle" class="sourceURL">&nbsp;來源連結</label><br>
                                      <a href="{{detail.sourceURL}}" target="_blank" class="show">{{detail.sourceURL}}</a>

                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary" data-dismiss="modal">返回</button>
                                  </div>
                              </div>
                            </div>
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
                    <div class="btn-group-vertical col-md-offset-3 col-md-6 col-md-offset-3">
                        <p class="link">相關連結</p>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/AboutRDO/business.php#1">本組簡介</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/AboutRDO/member.php#2">成員及職掌</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Files/%E4%BC%81%E5%8A%83%E7%B5%84FAQ(103%E5%B9%B4%E7%89%88).docx">校務發展計畫</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/record.php">校務發展委員會議</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/newCampus.php">八德校地籌設</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/self_evaluation/update.php">校務評鑑</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/integrationGuide.php">教育部統合視導</button>
                    </div>
                </div>
            </div>

            <!-- 大學櫥窗 -->
           <div role="tabpanel" class="tab-pane fade" id="college" ng-init="dataC.showData2();">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show2 | orderBy: '-time' | filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox" data-toggle="modal" data-target="#Show3{{detail.id}}">
                            <p class="viewTitle" ><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>&nbsp;&nbsp;{{detail.subject}}</p>
                            <p class="viewSource" ng-bind="detail.source"></p>
                            <p class="viewContent" ng-bind-html="detail.content| cut:true:108:'...'|trustHtml"></p>
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show3{{detail.id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-body" id="ShowModal" >
                                      <!-- x -->
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <!-- 標題 -->
                                      <h1 class="modal-title text-center" id="myModalLabel">{{detail.subject}}</h1>
                                      <!-- 公告分類 -->
                                      <span class="label label-info">{{detail.type}}</span>
                                      <br><br>
                                      <!-- 來源 -->
                                      <p class="showSource">{{detail.source}}</p>

                                      <!-- 內容 -->
                                      <p class="showContent" ng-bind-html="detail.content|trustHtml"></p>

                                      <hr><label for="postTitle" class="sourceURL">&nbsp;來源連結</label><br>
                                      <a href="{{detail.sourceURL}}" target="_blank" class="show">{{detail.sourceURL}}</a>

                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary" data-dismiss="modal">返回</button>
                                  </div>
                              </div>
                            </div>
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
                    <div class="btn-group-vertical col-md-offset-3 col-md-6 col-md-offset-3">
                        <p class="link">相關連結</p>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/AboutRDO/business.php#1">本組簡介</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/AboutRDO/member.php#2">成員及職掌</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Files/%E4%BC%81%E5%8A%83%E7%B5%84FAQ(103%E5%B9%B4%E7%89%88).docx">校務發展計畫</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/record.php">校務發展委員會議</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/newCampus.php">八德校地籌設</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/self_evaluation/update.php">校務評鑑</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/integrationGuide.php">教育部統合視導</button>
                    </div>                    
                </div>
            </div>

            <!-- 焦點評論 -->
           <div role="tabpanel" class="tab-pane fade" id="highlight" ng-init="dataC.showData2();">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show2 | orderBy: '-time' | filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox" data-toggle="modal" data-target="#Show4{{detail.id}}">
                            <p class="viewTitle" ><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>&nbsp;&nbsp;{{detail.subject}}</p>
                            <p class="viewSource" ng-bind="detail.source"></p>
                            <p class="viewContent" ng-bind-html="detail.content| cut:true:108:'...'|trustHtml"></p>
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show4{{detail.id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-body" id="ShowModal" >
                                      <!-- x -->
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <!-- 標題 -->
                                      <h1 class="modal-title text-center" id="myModalLabel">{{detail.subject}}</h1>
                                      <!-- 公告分類 -->
                                      <span class="label label-info">{{detail.type}}</span>
                                      <br><br>
                                      <!-- 來源 -->
                                      <p class="showSource">{{detail.source}}</p>

                                      <!-- 內容 -->
                                      <p class="showContent" ng-bind-html="detail.content|trustHtml"></p>

                                      <hr><label for="postTitle" class="sourceURL">&nbsp;來源連結</label><br>
                                      <a href="{{detail.sourceURL}}" target="_blank" class="show">{{detail.sourceURL}}</a>

                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary" data-dismiss="modal">返回</button>
                                  </div>
                              </div>
                            </div>
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
                    <div class="btn-group-vertical col-md-offset-3 col-md-6 col-md-offset-3">
                        <p class="link">相關連結</p>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/AboutRDO/business.php#1">本組簡介</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/AboutRDO/member.php#2">成員及職掌</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Files/%E4%BC%81%E5%8A%83%E7%B5%84FAQ(103%E5%B9%B4%E7%89%88).docx">校務發展計畫</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/record.php">校務發展委員會議</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/newCampus.php">八德校地籌設</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/self_evaluation/update.php">校務評鑑</button>
                        <button class="btn btn-default btn-sm" href="http://www.ncu.edu.tw/~ncu7020/Project/integrationGuide.php">教育部統合視導</button>
                    </div>                    
                </div>
            </div>

        </div>
    </div>

</div>

<!-- Footer -->  
<ng-include src="'layouts/footer.php'"></ng-include>
    
</body>
</html>

