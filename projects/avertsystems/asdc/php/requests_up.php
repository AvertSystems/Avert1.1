<?php
// define variables and set to empty values
$errors = $firstNameErr = $emailErr = $lastNameErr = $phoneErr = $descErr = $serviceErr = "";
$firstname = $lastname = $email = $phone = $description = $service = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["inputs"])) {
        echo "string is empty.";
        exit();
  }
  $errors = array(null);
  $errors[0] = "";
  $namePattern = "/[A-z]{1,20}/";
  $emailPattern = "/[A-z0-9]*@[A-z]*\.[A-z]*/";
  $phonePattern = "/[0-9]{3}-[0-9]{3}-[0-9]{4}/";
  $descPattern = "/.{1,500}/";
  $str = explode("|", $_POST["inputs"]);
  $firstname = $str[0];
  $lastname = $str[1];
  $email = $str[2];
  $phone = $str[3];
  $description = $str[4];
  $service = $str[5];
  if (preg_match($namePattern, $firstname) != 1) {
    $firstNameErr = "Error: First name is required.";
    $errors[0] = $firstNameErr;
    echo $errors[0];
    exit();
  }
  if (preg_match($namePattern, $lastname) != 1) {
    $lastNameErr = "Error: Last name is required.";
    $errors[0] = $lastNameErr;
    echo $errors[0];
    exit();
  }
  if (preg_match($emailPattern, $email) != 1) {
    $emailErr = "Error: Email format is incorrect.\nEx: someone@somewhere.com";
    $errors[0] = $emailErr;
    echo $errors[0];
    exit();
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
        echo $emailErr;
        exit();
   }
  }
  if (preg_match($phonePattern, $phone) != 1) {
    $phoneErr = "Error: Phone must be in format: 555-555-5555.";
    $errors[0] = $phoneErr;
    echo $errors[0];
    exit();
  }
  if (preg_match($descPattern, $description) != 1) {
    $descErr = "Error: Description is required.";
    $errors[0] = $descErr;
    echo $errors[0];
    exit();
  }
  if (empty($service)) {
    $serviceErr = "Check code.";
    echo $serviceErr;
    exit();
  }
  // Connect to testdb and insert request
  $mysqli = new mysqli('localhost');
  // If connection is ok, connect
  if ($mysqli -> connect_errno)
        {
		echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
        }
  $sql = 'INSERT INTO requests (firstname, lastname, email, phone, description) VALUES ("'.$firstname.'", "'.$lastname.'", "'.$email.'", "'.$phone.'", "'.$description.'")';
  $result = $mysqli -> query($sql);
  $mysqli -> close();
// Send email
$to = $email;
$subject = "Your " . $service . " request";
$txt = "Hi " . $firstname . ",\n\nThis email was sent to confirm your " . $service . " request was received. No further action from you is required.\n\n Best regards, \n\n\n\n Christopher Reid";
$headers = "From: mail.avertsystems.co" . "\r\n" .
"CC: cg.reid@avertsystems.co";

mail($to,$subject,$txt,$headers);
// Echo results
echo "User input: firstName=" . $firstname . " lastName=" . $lastname . " email=" . $email . " phone=" . $phone . " description=" . $description . ". For service: " . $service . ".";
}
?>
                             
