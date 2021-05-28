<?php
     session_start();

     if($_SESSION["isLoggedin"]==true)
     {
?>
<?php
     if(isset($_GET['update_id']))
     $update_b=$_GET['update_id'];
     try{
          $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp","root","");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
         }    
         catch(PDOException $ex){
?>

         <script> 
              alert("Database connection error");
         </script>
<?php
      }

      $mysqlquery="SELECT*
                   FROM manager_info
                   WHERE Manager_id='$update_b'";
        
      $result=$conn->query($mysqlquery);

      if($result->rowCount()==1)
      {
        $table=$result->fetchAll();
        $row=$table[0];
?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Upadte Manager Form</title>

    <!-- Icons font CSS-->
    <link href="assets\css\material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="assets\css\font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="assets\css\select2.min.css" rel="stylesheet" media="all">
    <link href="assets\css\daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets\css\main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Update Manager Information</h2>
                </div>
                <div class="card-body">
                <form action="update_manager_data.php" method="POST">
               
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="first_name"
                                            value="<?php echo $row['first_name']?>">
                                            <label class="label--desc">first name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name"
                                            value="<?php echo $row['last_name']?>">
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email"
                                    value="<?php echo $row['email']?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="tel" name="phone"
                                            value="<?php echo $row['phone']?>">
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-row">
                            <div class="name">Building Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="building_name"
                                    value="<?php echo $row['building_name']?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Manager Id</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Manager_id"
                                    value="<?php echo $row['Manager_id']?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Joining Date</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="joining_date"
                                    value="<?php echo $row['joining_date']?>">
                                </div>
                            </div>
                        </div>

                          <input type="hidden" name="up_id" value="<?php echo $row['Manager_id']?>"

                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="assets\js\jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="assets\js\select2.min.js"></script>
    <script src="assets\js\moment.min.js"></script>
    <script src="assets\js\daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="assets\js\global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>



<?php       
      }              
?>


<?php
     }
     else {
?>
        <script>location.assign('login.php');</script>
<?php        
     }
?>