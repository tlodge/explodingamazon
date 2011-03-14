<?php
	header('Content-Type: text/javascript; charset=utf-8');
	$params = array();
	parse_str($_SERVER['QUERY_STRING'], $params);
	$curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_URL,$params['url']);
	curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
	$response = curl_exec($curl_handle);
	curl_close($curl_handle);
	print($response);