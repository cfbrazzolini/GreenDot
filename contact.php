<html>
<body>


<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["name"]==""||$_POST["email"]==""||$_POST["feedback"]==""){
echo "Fill All Fields..";
}
else{
$message = $_POST['feedback'];
$headers = 'From:'. $email2 . "\r\n"; // Sender's Email
$headers .= 'Cc:'. $email2 . "\r\n"; // copy to Sender
// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = wordwrap($message, 70);
// Send Mail By PHP Mail Function
mail("snishioka-healy16@my.whitworth.edu", $message, $headers);
echo "Your mail has been sent successfuly ! Thank you for your feedback";
}
}
}
?>



</body>
</html>
