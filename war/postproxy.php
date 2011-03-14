<?php
	
	
	$postvars = '';
	$url = '';
	
	while ($element = current($_POST)){
		if (key($_POST) == "url"){
			$url = $element;
		}else{
			$postvars .= urlencode(key($_POST)). '=' . urlencode($element) . '&';
		}
		next($_POST);
	}

	$session=curl_init($url);
	curl_setopt($session,CURLOPT_POST, true);
	curl_setopt($session,CURLOPT_POSTFIELDS,$postvars);
	curl_setopt($session,CURLOPT_HEADER, false);
	curl_setopt($session,CURLOPT_RETURNTRANSFER, true);
	
	$result = curl_exec($session);
	header('Content-Type: text/javascript; charset=utf-8');
	print($result);
	curl_close($session);
	