<?php

session_start();

include 'config.php';

//Takes the data specified in the 'log a reading' form and creates a new document to put in the ConditionData collection

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$_id = new MongoDB\BSON\ObjectID;
	$date = date('Y-m-d');
	$time =  date('h:i:s');
	$DateTime = $date . 'T' . $time . 'Z';

	$ConditionData = [];
	$ConditionData['_id'] = $_id;
	$ConditionData['Identification'] = $_SESSION['login_user']['ID'];
	$ConditionData['DateTime'] = $DateTime;

	//iterates over each attribte submitted and appends to the array. 
	foreach ($_POST as $key => $value) {
		if($value['Measure'] != ""){
			$ConditionData[$key] = ['Measure' => intval($value['Measure']), 'Unit' => $value['Unit']];
		};
	};

	//writes the data to the database
	writedata('ConditionData', $ConditionData);
	header("Location: ../Views/App/graphs.php");

}


 ?>