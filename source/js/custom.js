/*!
 *	微信公众号文章内嵌视频链接探查器 - 自定义JavaScript
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016 CRH380A-2722
 *	@license https://raw.githubusercontent.com/CRH380A-2722/Get-Wechat-MP-Pages-Video-Link/master/LICENSE MIT
 */

(function($) {

	function reloadActionsAfterPjax() {

		/* Copy to Clipboard */
		new Clipboard('.copy-to-clipboard');


		/* Home */
		$('a[class="navbar-brand"]').mouseenter(function() {
			$('#navbar-home-icon').attr('style', 'display: inline;');
		});

		$('a[class="navbar-brand"]').mouseleave(function() {
			$('#navbar-home-icon').attr('style', 'display: none;');
		});

		$('#mp-page-url-form').submit(function() {
			$('#mp-page-url-submit-btn').attr('disabled', 'disabled');
			$('#mp-page-url-submit-btn').html('<span class="fa fa-search"></span> 探查中...');
		});

	}

	/* Alias */
	function doActions() {
		reloadActionsAfterPjax();
	}


	$(document).ready(function() {

		doActions();

		/* Pjax */
		$(document).pjax('a', '#pjax-container', {
			fragment: '#pjax-container',
			timeout: 60000
		});

		$(document).on('submit', '#mp-page-url-form', function(e) {
			$.pjax.submit(e, '#pjax-container', {
				fragment: '#pjax-container',
				timeout: 60000
			});
		});
		
		$(document).on('pjax:send', function () {
			NProgress.start();
		});
		
		$(document).on('pjax:complete', function (e) {
			NProgress.done();
			reloadActionsAfterPjax();
			$('body, html').animate({scrollTop: 0}, 0);
		});

	});

})(jQuery);