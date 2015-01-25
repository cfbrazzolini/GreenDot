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
					echo "Fill All Fields..";
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
						$sender_email = "snishioka-healy16@my.whitworth.edu";

						
						$message = $_POST['feedback'];
						$headers = 'From:'. $email . "\r\n"; // Sender's Email
						$headers .= 'Cc:'. $email . "\r\n"; // Carbon copy to Sender
						// Message lines should not exceed 70 characters (PHP rule), so wrap it
						$message = wordwrap($message, 70);
						// Send Mail By PHP Mail Function
						mail($sender_email, $message, $headers);
						echo "Your mail has been sent successfuly ! Thank you for your feedback";
					}
				}
			}
			else{


		?>
		<div class="section" id="contact">
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
		</div>
		<?php 
			}
	 	?>

	</body>
</html>
