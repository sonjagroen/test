<?php
if (!empty(($_POST['name'])) & !empty(($_POST['password']))){ 
    $name = $_POST['name'];
    $password = $_POST['password'];
}
else {
    $name = "(name or password not entered)";
    $password = "(name or password not entered)";
}

echo <<<_END
<html>
	<head>
		<title>Bookstore</title>
		<link rel="stylesheet" href="layouts.css">
	</head>

	<body>
	   <div class="header">
		<a href="books.html"><img src="pictures/logo.jpg" alt="books" width="250" height="100"></a>   
	   </div>
	   	   
		<div class="navigation">
		 <a href="#">My Orders</a> 
		 <a href = "#">Wishlist</a>
		 <a href = "#">FAQ</a>
		 <a href = "#">Login</a>
	    </div>
		
		<div class = "container"> 					
			
			<div class="section1">		
				<h3>Categories</h3>
				<a href="academicBooks.html">Academic</a><br>
				<a href="childrenBooks.html">Children</a><br>
				<a href="books.html">Fiction</a><br>
				<a href="books.html">Religion</a><br>
				<a href="books.html">Travel</a><br>
			</div>
			
			<div class="section2">
				<h3>Order</h3>

		<p>Welcome $name !</p>
		<p>Your password is: $password</p>
			
		<br><br<><br><br<><br><br<>
			</div>
			
		</div>
		
		<div class="footer">
			<p>&copy;2023</p>	  
		</div>
		<br><br<><br><br<><br><br<>
	</body>
</html>
_END;
?>