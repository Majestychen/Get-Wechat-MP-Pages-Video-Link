<?php
/* http://mp.weixin.qq.com/s?__biz=MzA3NjEyOTI1Mw==&mid=2650902592&idx=1&sn=f984dcc4281a1dc81cbfc062d595404b&scene=1&srcid=08245JmBgj4BcrwnQQSCUDA2#rd */

//curl
$url = urldecode(@$_GET['url']);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

$r = curl_exec($ch);

curl_close($ch);


//get url
require './includes/simple_html_dom.php';

$html = new simple_html_dom();

$html->load($r);

//$sort = 1;

foreach ( $html->find('iframe') as $elem ) {
	//print "[{$sort}] " . htmlentities($elem) . '<br>';
	//$sort++;
	preg_match('/data-src="\S+"/', $elem, $matches);
	$replacement = str_ireplace('"', '', str_ireplace('data-src=', '', $matches[0]) );

	print $replacement;
}