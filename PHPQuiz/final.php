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
			   <p>PHP Quizer</p>
			</div>
		 </header>
		 
		 <section>
		     <div class="container">
			      <?php 
				  
				  	   $connection = "config/config.php";
        if(file_exists($connection)) {
			
			include_once($connection);
			
		}
		else {
			
			die("There was an mistake, please try again! <br>");
		}
				  
				  session_start(); 
				  
				 
				   
				  
				  
				  ?>
				  <div class="container">
				     <h2>Your Result</h2>
					 <p>Congragulations you have completed this test successfully.</p>
					 <p>Your <strong>Score</strong> is <?php echo @$_SESSION['score']; ?></p>
					 <?php unset($_SESSION['score']); ?>
					 
				  </div>
			 </div>
		 </section>
		 
		 <footer>
		    <div class="container">
			   Copyright &copy; IT SERES TUTOR
			</div>
		 </footer>
   </body>
</html>