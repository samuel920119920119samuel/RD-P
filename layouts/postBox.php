<p class="viewTitle" ><span ng-class="myStyle">{{detail.type}}</span>&nbsp;&nbsp;{{detail.subject}}</p>
<p class="viewSource" ng-bind="detail.source"></p>
<p class="viewContent" ng-bind-html="detail.content| cut:true:108:'...'|trustHtml"></p>