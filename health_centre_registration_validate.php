<?php 
        
 $nameErr= $emailErr = $passwordErr= $contactErr=$ageErr=$genderErr=$addressErr=$UsernameErr="";
$name = $email = $gender = $contact=$age=$address =$password=$Username= "";
$error=false;
$username="root";$database="health_centre";$host="localhost";
function test_input($data)
{
   $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
   return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $error=true;
  }
  else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $error=true;
      }
  }
  if(empty($_POST["address"])){
      $addressErr="Address is required";
      $error=true;
  }
  else
   $address=test_input($_POST["address"]);
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $error=true;
  }
  else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
      $error=true;
      }
  }
  if(empty($_POST["Username"]))
  {
      $UsernameErr="Username is required";
      $error=true;
  }
 else {
      $Username=test_input($_POST["Username"]);
  }
  
/*  if(empty($_POST["contact"])){
    $contactErr="Contact is required";
    $error=true;
  }
  else
    $contact=test_input($_POST["contact"]);*/
   
if(empty($_POST["password"])){
    $passwordErr="Password is required";
    $error=true;
}
else
    $password=test_input($_POST["password"]);
if($password!=test_input($_POST["repassword"])){
    $passwordErr="Passwords don't match";
    $error=true;
}
if(!$error){$c=mysql_connect($host,$username) or die(mysql_error());

$c2=mysql_select_db($database);
$query= "INSERT INTO `health_centre_details`(`Centre Name`,`Username`,`Email`,`Address`,`Password`) VALUES ('$name','$Username','$email','$address','$password')";
$c1=mysql_query($query);

}

                        
}
?>
  
<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Website CSS style -->
		<link href="bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Admin</title>
	</head>
	<body>
	
		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<center><font size="6">
				Sign Up </font><br></center>
				
				<!--<input type= "radio" name="registration" value="healthcenter" id="button1"  >Health Center 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type ="radio" name="registration" value="customer "  id ="button2" >Customer -->
				
					<form class="" method="post" action="health_centre_registration_validate.php">
						
						
                                                <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Health Centre Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>
                                               <div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Contact No</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="contact" class="form-control" name="contact" id="address"  placeholder="Enter your contact no"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="Username" id="username"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="repassword" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
                                                    <a href="health_centre_registration_validate.php" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Register</a>
						</div>
						<h5> <?php 
                                                echo $error;
                                                if(($error)){
             $msg="Invalid Entry. Please fill the form again with correct credentials" ;
             echo $msg; 
        }
             
        else {
           $msg="  Input form accepted." ;echo $msg; 
           echo "<a href=user_login.html>Click here to login</a>";
           
           
           
        }?></h5>
					</form>
				</div>
			</div>
		</div>

		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>

      