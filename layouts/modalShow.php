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