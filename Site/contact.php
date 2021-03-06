<!doctype html>
<html>
	<head>
			<meta charset="UTF-8">
			<title>GreenDot</title>
			<link rel="stylesheet" type="text/css" href="CSS/ContactForm.css">
	</head>
	<body>
		
	
		<?php
			//print_r($_SERVER);die();
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
			// Checking For Blank Fields..
				if($_POST["name"]==""||$_POST["email"]==""||$_POST["feedback"]==""){
					header("location:index.html#form");

				}else{
					// Check if the "Sender's Email" input field is filled out
					$email=$_POST['email'];
					// Sanitize E-mail Address
					$email = filter_var($email, FILTER_SANITIZE_EMAIL);
					// Validate E-mail Address
					$email= filter_var($email, FILTER_VALIDATE_EMAIL);
					if (!$email){
						echo "Invalid Sender's Email";
					}
					else{
						$destination_email = "Greendot@whitworth.edu";

						
						$message = $_POST['feedback'];
						$subject = "Green Dot Contact Received";
						$headers = 'From:'. $email . "\r\n"; // Sender's Email
						$headers .= 'CC:'. $email . "\r\n"; // Carbon copy to Sender
						// Message lines should not exceed 70 characters (PHP rule), so wrap it
						$message = wordwrap($message, 70);
						// Send Mail By PHP Mail Function
						mail($destination_email,$subject, $message, $headers);
						echo "Your mail has been sent successfuly ! Thank you for your feedback";
					}
				}
			}			
		?>
		<!-- <div class="section" id="contact">
			<h1>contact</h1>
			<form action="contact.php" id="form" method="post" name="form">
				<label>
				<h2>NAME</h2><input type="text" name="name"><br>
				</label>
				<label>
				<h2>EMAIL</h2><input type="text" name="email"><br>
				</label>
				<label>
				<h2>MESSAGE</h2><textarea id="feedback" name="feedback"></textarea><br><br>
				<input id="send" name="submit" type="submit" value="Send Feedback">
				</label>
			</form>
		</div> -->
	</body>
</html>
