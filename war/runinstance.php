<?php

	error_reporting(-1);

	// Set HTML headers
	//header("Content-type: text/html; charset=utf-8");
	
	// Include the SDK
	require_once './sdk-1.2.3/sdk.class.php';


	// Instantiate the AmazonEC2 class
	$ec2 = new AmazonEC2();
	
	$response = $ec2->describe_instances();
	
	$instances = $response->body->reservationSet->item;
	
	$json = array();
	if (count($instances) > 0){
		
		foreach($instances as $instance){
			
			$jsonitem = array (
				'id' => strval($instance->instancesSet->item->instanceId),
				'image' => strval($instance->instancesSet->item->imageId),
				'status' => strval($instance->instancesSet->item->instanceState->name),
				'dns' => strval($instance->instancesSet->item->dnsName)
			);
			$json[] = $jsonitem;//json_encode($jsonitem);
		}
		
	}
	
	$rsp = new StdClass();
	$rsp->instances = $json;
	header('Content-Type: text/javascript; charset=utf-8');
	print(json_encode($rsp));