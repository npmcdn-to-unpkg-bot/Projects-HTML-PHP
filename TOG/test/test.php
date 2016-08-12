<?php
	if(!empty($_POST)) {
	$data = $_POST;
	$os0 = $_POST["os0"];
	$planText = "Select Plan One";
	if($os0 == "" || $os0 == 0)
	{
	$os0 = $_POST["os1"];
	$planText = "Select Plan Two";
	if($os0 == "" || $os0 == 0){
	$os0 = $_POST["os2"];
	$planText = "Select Plan three";
	if($os0 == "" || $os0 == 0){
	$os0 = $_POST["os3"];
	$planText = "Select Plan four";
	
	if($os0 == "" || $os0 == 0){
	$os0 = $_POST["os4"];
	$planText = "Select Plan five";
	
	if($os0 == "" || $os0 == 0){
	$os0 = $_POST["os5"];
	$planText = "Select Plan six";
	}
	}
	
	}
	
	}
	}
	}

?>