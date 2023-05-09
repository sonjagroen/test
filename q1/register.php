<?php
	// The PHP code
	$member_id = $first_name = $last_name = $phone = $email = $password = $fitness_goals = $workout_schedule = $fitness_level = "";	
	$success = $failed = "";
	if (isset($_POST['member_id']))
		$member_id = ($_POST['member_id']);  
	if (isset($_POST['first_name']))
		$first_name = ($_POST['first_name']); 
	if (isset($_POST['last_name']))
		$last_name = ($_POST['last_name']);  
	if (isset($_POST['phone']))
		$phone = ($_POST['phone']); 
	if (isset($_POST['email']))
		$email = ($_POST['email']);  
	if (isset($_POST['password']))
		$password = ($_POST['password']); 
	if (isset($_POST['fitness_goals']))
		$fitness_goals = ($_POST['fitness_goals']);  
	if (isset($_POST['workout_schedule']))
		$workout_schedule = ($_POST['workout_schedule']); 
	if (isset($_POST['fitness_level']))
		$fitness_level = ($_POST['fitness_level']);  	
		
	// INSERT DATA IN DATABASE => MEMBER DETAILS
	// Connect Details
	$host = 'localhost'; 
	$data = 'gym'; 
	$user = 'root'; 
	$pass = 'MySQL0123';
	$chrs = 'utf8mb4';
	$attr = "mysql:host=$host;dbname=$data;charset=$chrs";
	$opts =
		[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES => false,
		];
	
	try
	{
		$pdo = new PDO($attr, $user, $pass, $opts);
	}
	catch (PDOException $e)
	{
		throw new PDOException($e->getMessage(), (int)$e->getCode());
	}

	$stmt = $pdo->prepare('INSERT INTO member VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
	$stmt->bindParam(1, $member_id, PDO::PARAM_STR, 10);
	$stmt->bindParam(2, $first_name, PDO::PARAM_STR, 50);
	$stmt->bindParam(3, $last_name, PDO::PARAM_STR, 50);
	$stmt->bindParam(4, $phone, PDO::PARAM_STR, 10);
	$stmt->bindParam(5, $email, PDO::PARAM_STR, 50);
	$stmt->bindParam(6, $password, PDO::PARAM_STR, 20);
	$stmt->bindParam(7, $fitness_goals, PDO::PARAM_STR, 50);
	$stmt->bindParam(8, $workout_schedule, PDO::PARAM_STR, 50);
	$stmt->bindParam(9, $fitness_level, PDO::PARAM_STR, 20);

	$stmt->execute([$member_id, $first_name, $last_name, $phone, $email, $password, $fitness_goals, $workout_schedule, $fitness_level]);
	$count = $stmt->rowCount();
	printf("%d Row inserted.\n", $count);				
		
	//  SEND EMAIL TO NEW MEMBER THAT REGISTERED
	//if(isset($_POST['submit'])){
		$mailto = "sonja.groenewald@eduvos.com";
		
		//Get member details
		$name = $first_name." ".$last_name;
		$fromEmail = $email;
		$phone = $phone;
		$subject = "Member registration";
		$subject2 = "Confirmation:  Registration was successful | HMA WebDesign";
		$message = "Client name:".$name."\n"."Phone number: ".$phone."\n\n";
		$message2 = "Dear".$name."\n"."Thank you for your registration."."\n\n"."Regards\n-HMA WebDesign";
		$headers = "From: ".$fromEmail;
		$header2 = "From: ".$mailto;
		$result1 = mail($mailto, $subject, $message, $headers);
		$result2 = mail($fromEmail, $subject2, $message2, $header2);
		
		
		if($result1 && $result2){
			$success = "Your message was send Successfully!";	
		}
		else{
			$failed = "Sorry!  Message was not sent.  Try agian later.";
		}
	//}		
		
	// DISPLAY STORED MEMBER'S DETAILS ON THE FORM
	$stmt = $pdo->prepare('SELECT * FROM member WHERE member_id = ?');
	$stmt->bindParam(1, $member_id, PDO::PARAM_STR, 10);
	
	$stmt->execute([$member_id]);
	$count = $stmt->rowCount();
	printf("%d Row(s) returned.\n", $count);
	
	if($count > 0){
		$result = $stmt->fetch(PDO::FETCH_BOTH);  // Fetch member results in to display on page

		$member_id = $result['member_id'];
		$first_name = $result['first_name'];
		$last_name = $result['last_name'];
		$phone = $result['phone_number'];
		$email = $result['email'];	
		$password = $result['password'];
		$fitness_goals = $result['fitness_goals'];
		$workout_schedule = $result['workout_schedule'];		
		$fitness_level = $result['fitness_level'];
				
		echo <<<_END
			<!DOCTYPE html>\n<html><head><title>Bookstore</title>
				<link rel="stylesheet" href="layouts.css">
				<script type="text/javascript" src="scriptRegister.js"></script>
			</head>

			<body">			   
					
					<div class="section2">
						<h3>Order</h3>
						<p>Welcome $first_name !</p>
						<fieldset>
							<legend>We have hour details as follow:</legend>
								
				   Member ID:  $member_id <br>
				   First name:  $first_name <br>
				   Last name:  $last_name <br>
				   Phone:  $phone <br>
				   Email:  $email <br>
				   Password:  $password <br>
				   Fitness goals:  $fitness_goals <br>
				   Workout schedule:  $workout_schedule <br>
				   Fitness level:  $fitness_level <br>
						</fieldset>
						
			Email send: $success, $failed <br>
			_END;	
		exit;
	}
	
	

?>