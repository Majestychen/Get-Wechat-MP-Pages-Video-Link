			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">输入图文页面地址 <small>( <a id="help-get-link" href="javascript:void(0);"><span class="fa fa-question-circle"></span> 不知道图文地址咋获取？)</a></small></h3>
				</div>
				<div class="panel-body">
					<form id="mp-page-url-form" action="./fetch.php" method="GET">
						<div class="col-md-10 col-sm-10"><p><input id="mp-page-url" name="url" type="url" class="form-control" pattern="^http://mp.weixin.qq.com/\S+$" placeholder="键入微信图文地址，系统将自动探查出视频地址..." <?php if ( isset($_GET['url']) && !empty(@$_GET['url']) ) { print 'value="' . @$_GET['url'] . '"'; } ?> required></p></div>
						<div class="col-md-2 col-sm-2"><p><button id="mp-page-url-submit-btn" class="btn btn-success form-control" type="submit"><span class="fa fa-search"></span> 开始探查</button></p></div>
					</form>
				</div>
			</div>