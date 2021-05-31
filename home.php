<?php
     session_start();

     if($_SESSION['isLoggedin']==true)
     {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>admin home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets\css\style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">FMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Forms <span class="caret"></span></a>
        <ul class="dropdown-menu">
         
          <li><a href="building_form.php">Add New Building</a></li>
          <li><a href="client_form.php">Add Client</a></li>
          <li><a href="manager_form.php">Add Manager</a></li>
          <li><a href="invoice_form.php">Add New Invoice</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Tables <span class="caret"></span></a>
        <ul class="dropdown-menu">
          
          <li><a href="building_list.php">Building List </a></li>
          <li><a href="invoice_list.php">Invoice List </a></li>
          <li><a href="manager_list.php">Manager List </a></li>
         
        </ul>
      </li>
     
      
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> LOG-OUT</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h1>HELLO ADMIN</h1>
  <p> WELCOME TO ADMIN HOME PAGE </p>
</div>

</body>
</html>

<?php
     }
     else {
?>
        <script>location.assign('login.php');</script>
<?php        
     }
?>