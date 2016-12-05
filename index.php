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

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="http://www.ncu.edu.tw/~ncu7020/index.php">國立中央大學研發處</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
          </div>
          <ul class="nav navbar-nav collapse navbar-collapse" id="app-navbar-collapse">
              <li><a href="http://www.ncu.edu.tw/~ncu7020/AboutRDO/">關於研發處</a></li>
              <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">企劃組 <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="http://www.ncu.edu.tw/~ncu7020/AboutRDO/business.php#1">本組簡介</a></li>
                      <li><a href="http://www.ncu.edu.tw/~ncu7020/AboutRDO/member.php#2">成員及職掌</a></li>
                      <li><a href="http://www.ncu.edu.tw/~ncu7020/Files/%E4%BC%81%E5%8A%83%E7%B5%84FAQ(103%E5%B9%B4%E7%89%88).docx">校務發展計畫</a></li>
                      <li><a href="http://www.ncu.edu.tw/~ncu7020/Project/record.php">校務發展委員會議</a></li>
                      <li><a href="http://www.ncu.edu.tw/~ncu7020/Project/newCampus.php">八德校地籌設</a></li>
                      <li><a href="http://www.ncu.edu.tw/~ncu7020/self_evaluation/update.php">校務評鑑</li>
                      <li><a href="http://www.ncu.edu.tw/~ncu7020/Project/integrationGuide.php">教育部統合視導</a></li>
                  </ul>
              </li>
              <li><a href="http://www.ncu.edu.tw/~ncu7020/Research/">研究推動組</a></li>
              <li><a href="http://tlo.ncu.edu.tw/portal/">智權技轉組</a></li>
              <li><a href="http://www.iic.ncu.edu.tw/">創新育成中心</a></li>
              <li><a href="http://www.ncu.edu.tw/~ncu7020/Instrument/">貴重儀器中心</a></li>
              <li><a href="http://www.ncu.edu.tw/~ncu7020/EEC/">環境教育中心</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li> <a href="login.php" ng-click="dataC.test()"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
          </ul>
        </div>
    </nav>
  
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
            <div role="tabpanel" class="tab-pane fade in active" id="all" ng-init="dataC.showData2();dataC.order=true;">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show | orderBy: dataC.orderGet() | filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox">
                            <a class="clickable" href="" data-toggle="modal" data-target="#Show{{detail.$id}}"><p class="viewTitle" ><span class="badge">100</span>{{detail.subject}}</p></a>
                            <p class="viewSource" ng-bind="detail.source"></p>
                            <p class="viewContent" ng-bind-html="detail.content| cut:true:108:'...'|trustHtml"></p>
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show{{detail.$id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <!-- 標題 -->
                                      <h1 class="modal-title text-center" id="myModalLabel">{{detail.subject}}</h1>
                                      <!-- 公告分類 -->
                                      <span class="label label-info">{{detail.type}}</span>

                                  </div>

                                  <div class="modal-body" id="ShowModal" >
                                      <!-- 來源 -->
                                      <p class="showSource">{{detail.source}}</p>

                                      <!-- 內容 -->
                                      <p class="showContent" ng-bind-html="detail.content|trustHtml"></p>

                                      <label for="postTitle">來源連結</label>
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
                        <button class="show-more-btn" ng-show="dataC.hasMoreItemsToShow2()" ng-click="dataC.showMoreItems2()">Show more</button>
                    </div>
                </div>
                <div class="col-md-4 tools">
                    <!-- 時間排序 -->
                    <div class="text-center">
                        <button class="btn btn-primary btn-order" ng-click="dataC.order=true">由新到舊</button>
                        <button class="btn btn-primary btn-order" ng-click="dataC.order=false">由舊到新</button>
                    </div>
                    <!-- 搜尋 -->
                    <div class="searchArea col-md-offset-2 col-md-8 ">
                          <input type="text" class="form-control col-md-4" placeholder="搜尋標題" ng-model="search.subject">
                    </div>
                </div>  
            </div>

            <!-- 高教資訊 -->
            <div role="tabpanel" class="tab-pane fade" id="education" ng-init="dataC.showData2();dataC.order=true;">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show2 | orderBy: dataC.orderGet() | filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox">
                            <a class="clickable" href="" data-toggle="modal" data-target="#Show{{detail.$id}}"><p class="viewTitle" ><span class="badge">100</span>{{detail.subject}}</p></a>
                            <p class="viewSource" ng-bind="detail.source"></p>
                            <p class="viewContent" ng-bind-html="detail.content| cut:true:108:'...'|trustHtml"></p>
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show{{detail.$id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <!-- 標題 -->
                                      <h1 class="modal-title text-center" id="myModalLabel">{{detail.subject}}</h1>
                                      <!-- 公告分類 -->
                                      <span class="label label-info">{{detail.type}}</span>

                                  </div>

                                  <div class="modal-body" id="ShowModal" >
                                      <!-- 來源 -->
                                      <p class="showSource">{{detail.source}}</p>

                                      <!-- 內容 -->
                                      <p class="showContent" ng-bind-html="detail.content|trustHtml"></p>

                                      <label for="postTitle">來源連結</label>
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
                    <!-- 時間排序 -->
                    <div class="text-center">
                        <button class="btn btn-primary btn-order" ng-click="dataC.order=true">由新到舊</button>
                        <button class="btn btn-primary btn-order" ng-click="dataC.order=false">由舊到新</button>
                    </div>
                    <!-- 搜尋 -->
                    <div class="searchArea col-md-offset-2 col-md-8 ">
                          <input type="text" class="form-control col-md-4" placeholder="搜尋標題" ng-model="search.subject">
                    </div>
                </div>
            </div>

            <!-- 科技政策 -->
            <div role="tabpanel" class="tab-pane fade" id="technology" ng-init="dataC.showData2();dataC.order=true;">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show2 | orderBy: dataC.orderGet() | filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox">
                            <a class="clickable" href="" data-toggle="modal" data-target="#Show{{detail.$id}}"><p class="viewTitle" ><span class="badge">100</span>{{detail.subject}}</p></a>
                            <p class="viewSource" ng-bind="detail.source"></p>
                            <p class="viewContent" ng-bind-html="detail.content| cut:true:108:'...'|trustHtml"></p>
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show{{detail.$id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <!-- 標題 -->
                                      <h1 class="modal-title text-center" id="myModalLabel">{{detail.subject}}</h1>
                                      <!-- 公告分類 -->
                                      <span class="label label-info">{{detail.type}}</span>

                                  </div>

                                  <div class="modal-body" id="ShowModal" >
                                      <!-- 來源 -->
                                      <p class="showSource">{{detail.source}}</p>

                                      <!-- 內容 -->
                                      <p class="showContent" ng-bind-html="detail.content|trustHtml"></p>

                                      <label for="postTitle">來源連結</label>
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
                    <!-- 時間排序 -->
                    <div class="text-center">
                        <button class="btn btn-primary btn-order" ng-click="dataC.order=true">由新到舊</button>
                        <button class="btn btn-primary btn-order" ng-click="dataC.order=false">由舊到新</button>
                    </div>
                    <!-- 搜尋 -->
                    <div class="searchArea col-md-offset-2 col-md-8 ">
                          <input type="text" class="form-control col-md-4" placeholder="搜尋標題" ng-model="search.subject">
                    </div>
                </div>
            </div>

            <!-- 大學櫥窗 -->
            <div role="tabpanel" class="tab-pane fade" id="college" ng-init="dataC.showData2();dataC.order=true;">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show2 | orderBy: dataC.orderGet() | filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox">
                            <a class="clickable" href="" data-toggle="modal" data-target="#Show{{detail.$id}}"><p class="viewTitle" ><span class="badge">100</span>{{detail.subject}}</p></a>
                            <p class="viewSource" ng-bind="detail.source"></p>
                            <p class="viewContent" ng-bind-html="detail.content| cut:true:108:'...'|trustHtml"></p>
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show{{detail.$id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <!-- 標題 -->
                                      <h1 class="modal-title text-center" id="myModalLabel">{{detail.subject}}</h1>
                                      <!-- 公告分類 -->
                                      <span class="label label-info">{{detail.type}}</span>

                                  </div>

                                  <div class="modal-body" id="ShowModal" >
                                      <!-- 來源 -->
                                      <p class="showSource">{{detail.source}}</p>

                                      <!-- 內容 -->
                                      <p class="showContent" ng-bind-html="detail.content|trustHtml"></p>

                                      <label for="postTitle">來源連結</label>
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
                    <!-- 時間排序 -->
                    <div class="text-center">
                        <button class="btn btn-primary btn-order" ng-click="dataC.order=true">由新到舊</button>
                        <button class="btn btn-primary btn-order" ng-click="dataC.order=false">由舊到新</button>
                    </div>
                    <!-- 搜尋 -->
                    <div class="searchArea col-md-offset-2 col-md-8 ">
                          <input type="text" class="form-control col-md-4" placeholder="搜尋標題" ng-model="search.subject">
                    </div>
                </div>                
            </div>

            <!-- 焦點評論 -->
            <div role="tabpanel" class="tab-pane fade" id="highlight" ng-init="dataC.showData2();dataC.order=true;">
                <div class="col-md-8">
                    <section ng-repeat="detail in dataC.show2 | orderBy: dataC.orderGet() | filter:search:strict | limitTo: dataC.paginationLimit2()">
                        <!-- postBox -->
                        <div class="postBox">
                            <a class="clickable" href="" data-toggle="modal" data-target="#Show{{detail.$id}}"><p class="viewTitle" ><span class="badge">100</span>{{detail.subject}}</p></a>
                            <p class="viewSource" ng-bind="detail.source"></p>
                            <p class="viewContent" ng-bind-html="detail.content| cut:true:108:'...'|trustHtml"></p>
                        </div>
                        <!-- modal for Show -->
                        <div class="modal fade" id="Show{{detail.$id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <!-- 標題 -->
                                      <h1 class="modal-title text-center" id="myModalLabel">{{detail.subject}}</h1>
                                      <!-- 公告分類 -->
                                      <span class="label label-info">{{detail.type}}</span>

                                  </div>

                                  <div class="modal-body" id="ShowModal" >
                                      <!-- 來源 -->
                                      <p class="showSource">{{detail.source}}</p>

                                      <!-- 內容 -->
                                      <p class="showContent" ng-bind-html="detail.content|trustHtml"></p>

                                      <label for="postTitle">來源連結</label>
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
                    <!-- 時間排序 -->
                    <div class="text-center">
                        <button class="btn btn-primary btn-order" ng-click="dataC.order=true">由新到舊</button>
                        <button class="btn btn-primary btn-order" ng-click="dataC.order=false">由舊到新</button>
                    </div>
                    <!-- 搜尋 -->
                    <div class="searchArea col-md-offset-2 col-md-8 ">
                          <input type="text" class="form-control col-md-4" placeholder="搜尋標題" ng-model="search.subject">
                    </div>
                </div>                
            </div>

        </div>
    </div>

</div>


    
</body>
</html>

