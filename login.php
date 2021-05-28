<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login </title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="assets\css\bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="assets\css\font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="assets\css\style.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
	 </head>
	
	<body>
	
		<div class="wrapper">
			<!-- header -->
			
			
			<!-- main content -->
			<div class="main-content">
				<div class="container">
					<!-- login area -->
					<div class="login-area">
						<!-- heading -->
						<h3>Sign In, To Your Account</h3>
				
						<form role="form" id="login-form" action="verifylogin.php" method="POST">
						
							<div class="form-group">
								<label for="email">Email address</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Password">
							</div>
							<div class="checkbox form-group">
								<label>
									<input type="checkbox"> Remember me
								</label>
							</div>
							<button type="submit" class="btn btn-warning">Login</button>
						</form>
						
					</div>
				</div>
			</div>
			
			<!-- footer -->
			
		</div>		
		
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="assets\js\bootstrap.min.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="assets\js\html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="assets\js\custom.js"></script>
	</body>	
</html>