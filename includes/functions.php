<?php
/**
 *	微信公众号文章内嵌视频链接探查器 - 函数库
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016 CRH380A-2722
 *	@license https://raw.githubusercontent.com/CRH380A-2722/Get-Wechat-MP-Pages-Video-Link/master/LICENSE MIT
 */


/**
 *	包含模板文件
 *
 *	@return void
 *
 *	@note 参数数量可变动
 */

function template() {
	$args = func_get_args();
	for ($a = 0; $a < count($args); $a++) {
		if ( !file_exists('./templates/' . $args[$a] . '.php') ) {
			print '<div class="alert alert-danger">模板文件: ' . $args[$a] . '.php 不存在！</div>';
		} else {
			include './templates/' . $args[$a] . '.php';
		}
	}
}


/**
 *	cURL获取微信公众号图文页面内嵌视频
 *
 *	@param string $url [微信公众号图文链接]
 *
 *	@return array
 */

function fetchpage($url) {
	$url = urldecode($url);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$html = curl_exec($ch);
	curl_close($ch);

	$shd = new simple_html_dom();
	$shd->load($html);
	$result = array();
	foreach ( $shd->find('iframe') as $elem ) {
		preg_match('/data-src="\S+"/', $elem, $matches);
		$replacement = str_ireplace('"', '', str_ireplace('data-src=', '', $matches[0]) );
		$result[] = $replacement;
	}
	return $result;
}


/**
 *	显示错误信息
 *
 *	@param string $msg [错误消息]
 *
 *	@return void
 */

function error($msg) {
	print '<div class="alert alert-danger"><span class="fa fa-times"> ' . $msg . '</div>';
}
