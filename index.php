<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Form</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<center><h1>Contact Form</h1></center>						
						<form method="POST" action="">
							<div class="form-group">
								<label for="exampleFormControlInput1">Name</label>
								<input type="text" class="form-control" name="name"  placeholder="Your Name" required="">
							</div>

							<div class="form-group">
								<label for="exampleFormControlInput1">Your Email Adress</label>
								<input type="email" class="form-control" name="email"  placeholder="example@example.com" required="">
							</div>		

							<div class="form-group">
								<label for="exampleFormControlInput1">Subject</label>
								<input type="text" name="subject" class="form-control" required="">
							</div>			

							<div class="form-group">
								<label for="exampleFormControlTextarea1">Message</label>
								<textarea class="form-control" name="message" rows="3" required="" placeholder="Write Your Message"></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
							<!-- / We link the SweatAlert file in the JS folder. -->
							<script src="js/sweetalert.min.js"></script>

							<!-- / We complete our form and move on to PDO transactions -->

							<?php

							include('fonc.php'); // we include the database on our page

							if ($_POST) // Checking If Data Has Been Posted
							{

								$save = $connect->prepare('INSERT INTO messages SET name=:name, email=:email, subject=:subject, message=:message'); 
								//If Data Is Posted, Posted Data Is Being Posted To Database
								$insert = $save->execute(array(  // Run our query and define with ARRAY variable

									'name' => htmlspecialchars($_POST['name']),
									'email' => htmlspecialchars($_POST['email']),
									'subject' => htmlspecialchars($_POST['subject']),
									'message' => htmlspecialchars($_POST['message']),
								));

								if ($insert) { //If our data is sent to the database, it warns with SweatAlert and redirects the page to index.php
									echo '<script>swal("Successful","Your Message Has Been Sent To Us, We Will Be Back As Soon As Possible...","success").then((value)=>{ window.location.href = "index.php"}); </script>'; 						
           
								}
								else  // If there is an error, we print it with SweatAlert
								{
									echo '<script>swal("Error","Check Your Error","error");</script>';
								}

							}
							?>
						</form>
					</div>
				</div>
				<center><h6>Developer By F??rat YILDIZ</h6><p>www.github.com/FRTYZ</p></center>
			</div>
		</div>
	</div>


	<script src="js/jquery-3.4.1.min.js"></script>	
	<script src="js/bootstrap.min.js"></script>

</body>
</html>