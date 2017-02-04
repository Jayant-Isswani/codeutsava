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
if(!$error){$c=mysqli_connect($host,$username) or die(mysqli_error());
$c2=mysqli_select_db($c,$database);
$query= "INSERT INTO `customer_details`(`Customer Name`,`Address`,`Email`,`Username`,`Password`) VALUES ('$name','$address','$email','$Username','$password')";
$c1=mysqli_query($c,$query);

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
				
					<form class="" method="post" action="validate_1.php">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Patient Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
								</div>
                                                            <span class="error"> <?php echo $nameErr;?></span>
							</div>
						</div>
                                               <div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="address" class="form-control" name="address" id="confirm"  placeholder="Confirm your Password"/>
								</div>
                                                            <span class="error"> <?php echo $addressErr;?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
                                                            <span class="error"> <?php echo $emailErr;?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
								</div>
                                                            <span class="error"> <?php echo $UsernameErr;?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
                                                            <span class="error"> <?php echo $passwordErr;?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
                                                            <span class="error"> <?php echo $passwordErr;?></span>
							</div>
						</div>

						<div class="form-group ">
							<input type="submit" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">
						</div>
						<h5> <?php if(($error)){
             $msg="Invalid Entry. Please fill the form again with correct credentials" ;
             echo $msg; 
        }
             else {
           $msg="Input form accepted." ;echo $msg; 
           echo "<a href=login.php>Click here to login</a>";
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
