<!DOCTYPE html>
<html>
   <head>
      <title>PHP Quiz</title>
	  <meta charset="utf-8"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <link rel="stylesheet" type="text/css" href="css/style.css"/>
   </head>
   <body>
      
	     <header>
		   <div class="container"> 
		       <p class="subject">Quiz About Programming</p>
		   </div>
		</header>
		 
		 <section>
		 <?php
		 
		 $connection = "config/config.php"; 
		 if(file_exists($connection)) {
			 
			 include_once($connection);
			 
		 }
		 else {
			 
			 die("There was an mistake, please try again! <br>");
			 
		 }
		 
		 $number = $_GET['n'];
		 
		 $sql = "SELECT * FROM `questions` WHERE `question_number` = :qnumber";
		 $qnumber = $config->prepare($sql);
		 $qnumber->execute(array(
		 
		 'qnumber' => $number
		 
		 ));
		 $question = $qnumber->fetchAll(PDO::FETCH_OBJ);
		 foreach($question as $quest) {
			 
			 $question_text = $quest->question_text; 
			 
		 }
		 
		 
		 $qkor = "SELECT * FROM `options` WHERE `question_number` = :qnumberr";
		 $choice = $config->prepare($qkor);
		 $choice->execute(array(
		 
		 ':qnumberr' => $number
		 
		 ));
		 $choices = $choice->fetchAll(PDO::FETCH_OBJ);
		 foreach($choices as $choicee) {
			 
			 
			 $id = $choicee->id; 
			 $option = $choicee->option; 
			 
		 }
		 
		 
		 
		 $sql = "SELECT * FROM `questions`";
		 $query = $config->query($sql);
		 $total_questions = $query->rowCount(); 
		 
		 
		 
		 
		 
		 ?>
		    <div class="container">
			   <div class="container">
			      <div class="current">Question <?php echo $number; ?> of <?php echo $total_questions; ?></div>
				  <p class="question"><?php echo @$question_text ;?></p>
				  <form method="POST" action="process.php">
				    <ul class="choicess">
					<?php  foreach($choices as $choicee) { ?>
			
					   <li><input type="radio" name="choice" value="<?php echo $choicee->id; ?>"/> <?php echo $choicee->option; ?> </li>
					
					<?php } ?>
					
					</ul>
					
					<input type="hidden" name="number" value="<?php echo $number; ?>"/>
					<input type="submit" name="submit" value="Submit"/>
				  </form>
			 </div>
			      
			    
			</div>
		 </section>
		 
		 <footer>
		    <div class="container footer-c">
			    <p class="footer-c">Dino Emso &copy </p>
			</div>
		</footer>
   </body>
</html>