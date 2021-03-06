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
    <title>Add apartment Form</title>

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
    <?php  
    $building_name="";
      if(isset($_GET['b_name'])) 
      $building_name=$_GET['b_name'];
    ?>


    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">New apartment Form</h2>
                </div>
                <div class="name">Building Name: <?php echo $building_name ?></div>
                <div class="card-body">
                    <form  action="add_apartment.php" method="POST">

                    <div class="form-row">
                            <div class="name">Building Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="building_name" value="<?php echo $building_name ?>" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Flat No:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="flat_no">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Rent</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="rent">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Gas Bill</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="gas_bill">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Water Bill</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="water_bill">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Electricity Bill</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="electricity_bill">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Additional Bill</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="additional_bill">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Service Charge</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="service_charge">
                                </div>
                            </div>
                        </div>

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
<!-- end document-->