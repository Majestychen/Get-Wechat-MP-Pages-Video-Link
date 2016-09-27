<?php
/**
 *	微信公众号文章内嵌视频链接探查器 - 探查视频链接
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016 CRH380A-2722
 *	@license https://raw.githubusercontent.com/CRH380A-2722/Get-Wechat-MP-Pages-Video-Link/master/LICENSE MIT
 */

require './script-autoloader.php';

if ( !isset($_GET['url']) || empty($_GET['url']) || !preg_match("/^http:\/\/mp.weixin.qq.com\/\S+$/", urldecode(@$_GET['url']) ) ) {
	error('传入参数错误');
}

template('header');

$r = fetchpage( urldecode(@$_GET['url']) );

if ( empty($r) ) {
	template('form', 'noresult');
} else {
	template('form', 'result');
}

template('footer');
