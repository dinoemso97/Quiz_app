<!DOCTYPE html>
<html>
   <head>
       <title>PHPQuiz</title>
	   <meta charset="utf-8"/>
	   <meta name="viewport" content="width=device-width ,initial-scale=1.0"/>
	   
	   <link rel="stylesheet" type="text/css" href="css/style.css"/>
   </head>
   <body>
       <?php
  
        $connection = "config/config.php";
        if(file_exists($connection)) {
			
			include_once($connection);
			
		}
		else {
			
			die("There was an mistake, please try again! <br>");
		}
  
        if(isset($_POST['submit'])) {
			
			$question_number = $_POST['question_number'];
			$question_text = $_POST['question_text'];
			$correct_choice = $_POST['correct_choice'];
			
			$choice = array(); 
			$choice[1] = $_POST['choice1'];
			$choice[2] = $_POST['choice2'];
			$choice[3] = $_POST['choice3'];
			$choice[4] = $_POST['choice4'];
			$choice[5] = $_POST['choice5'];
			
			$sql = "INSERT INTO `questions` SET 
			
			`question_number` = :qnumber , 
			`question_text` = :qtext 
		
			";
			$quizz = $config->prepare($sql);
			$quizz->execute(array(
			
			':qnumber' => $question_number , 
			':qtext' => $question_text
	
			));
			
			$quiz = $quizz->rowCount() + 1; 
			
			if($quiz) {
				
				 foreach($choice as $option => $value) {
					 if($value != "") {
						if($correct_choice == $option) { 
						
						    $is_correct = 1; 
						}
						else {
							
							$is_correct = 0; 
							
						}
						
						$sql = "INSERT INTO `options` SET 
						
						  `question_number` = :qnumber , 
						  `is_correct` = :iscorrect , 
						  `option` = :option
						
						
						";
						$quizer = $config->prepare($sql);
						$quizer->execute(array(
						
						
						  ':qnumber' => $question_number , 
						  ':iscorrect' => $is_correct , 
						  ':option' => $value
						
						
						));
						
						if($quizer) {
							
							continue;
						}
						else {
							
							die();
						}
						
					 }
					
					 
					 
				 }
				 
				 $message = " Question has been added!";
				
			}
			
			
		
		}
           
		   $sql = "SELECT * FROM `questions`";
		   $question = $config->query($sql);
		   $total = $question->rowCount(); 
		   $next = $total + 1; 
		   
        ?>
	     <div class="container"> 
		     <form method="POST" action="addquestion.php">
			     <p>
				    <label>Question Number</label>
					<input type="number" name="question_number" value="<?php echo $next; ?>"/>
				 </p>
				 
				 <p>
				    <label>Question Text</label>
					<input type="text" name="question_text"/>
				 </p>
				 
				 <p>
				    <label>Choice 1:</label>
					<input type="text" name="choice1"/>
				 </p>
				 
				  <p>
				    <label>Choice 2:</label>
					<input type="text" name="choice2"/>
				 </p>
				 
				  <p>
				    <label>Choice 3:</label>
					<input type="text" name="choice3"/>
				 </p>
				 
				  <p>
				    <label>Choice 4:</label>
					<input type="text" name="choice4"/>
				 </p>
				 
				 <p>
				    <label>Choice 5:</label>
					<input type="text" name="choice5"/>
				 </p>
				 
				 <p>
				    <label>Correct Option Number<label>
					<input type="number" name="correct_choice"/>
				 </p>
				 
				 <input type="submit" name="submit" value="Add question"/>
				 
			 </form>
		 </div>
      
   </body>
</html>