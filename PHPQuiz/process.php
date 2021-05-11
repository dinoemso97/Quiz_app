<?php

$connection = "config/config.php";
if(file_exists($connection)) {
	
	include_once($connection);
	
}
else {
	
	
	die("There was an mistake, please try again! <br>");
	
}

session_start(); 

if(!isset($_SESSION['score'])) {
	
	$_SESSION['score'] = 0; 
	
}


if($_POST) {
	
	$query = "SELECT * FROM `questions`";
	$questions = $config->query($query);
	$total_questions = $questions->rowCount(); 
	
	$number = $_POST['number'];
	
	$selected_choice = $_POST['choice'];
	
	$next = $number+1; 
	
	
	$query = "SELECT * FROM `options` WHERE `question_number` = :qnumber 
	AND `is_correct` = :one";
	$result = $config->prepare($query);
	$result->execute(array(
	
	':qnumber' => $number , 
	':one' => 1
	
	));
	
	$row = $result->fetchAll(PDO::FETCH_OBJ);
	foreach($row as $roww) {
		
		$correct_choice = $row->id; 
		
	
	if($selected_choice == $correct_choice) { 
	
	     $_SESSION['score']++;
	}
	if($number == $total_questions) {
		
		header("Location: final.php");
	}
	else {
		
		
		header("Location: question.php?n=". $next);
		
	}
	
	}
	
}



?>