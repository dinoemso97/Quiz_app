<!DOCTYPE html>
<html>
    <head>
	    
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width , initial-scale=1.0"/>
		
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
		 
		 
		   $sql = "SELECT * FROM `questions`";
		   $questions = $config->query($sql);
		   $total_questions = $questions->rowCount();
		 
		 ?>
		     <div class="container">
			      <h2>Test your Progamming Knowledge</h2>
				  <p>This is a multiple choise quiz to test your Programming Knowledge.</p>
				  <ul>
				      <li><strong>Number of Qustions: </strong><?php echo $total_questions; ?></li>
					  <li><strong>Type:</strong> Multiple Choice</li>
					  <li><strong>Estimed Time: </strong><?php echo $total_questions . " Minutes" ?></li>
				  </ul>
				  
				  <a href="question.php?n=1" class="start">Start Quizer</a>
				  
			 </div>
		 </section>
		   
		 
		 <footer>
		    <div class="container footer-c">
			    <p class="footer-c">Dino Emso &copy </p>
			</div>
		</footer>
	</body>
</html>