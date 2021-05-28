<?php 
      if(isset($_POST['building_name'])&& isset($_POST['flat_no'])&& isset($_POST['invoice_id'])&& isset($_POST['rent'])&& isset($_POST['gas_bill'])&& isset($_POST['water_bill'])&& isset($_POST['electricity_bill'])&& isset($_POST['additional_bill'])&& isset($_POST['service_charge']))
      {
          $rent=$_POST['rent'];
          $invoice_id=$_POST['invoice_id'];
          $building_name=$_POST['building_name'];
          $flat_no=$_POST['flat_no'];
          $gas_bill=$_POST['gas_bill'];
          $water_bill=$_POST['water_bill'];
          $electricity_bill=$_POST['electricity_bill'];
          $additional_bill=$_POST['additional_bill'];
          $service_charge=$_POST['service_charge'];
          
         

          try{
              $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp","root","");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
          }
          catch(PDOException $ex){
            // echo "login failed 1";
            echo"<script>location.assign('building_form.php');</script>";
          }
          
          $mysqlcode="CREATE TABLE IF NOT EXISTS apartment(
            Invoice_id VARCHAR(20),
            Building_Name VARCHAR(50),
            Flat_No VARCHAR(10),
            Rent INT(11),
            Water_Bill FLOAT(10),
            Gas_Bill FLOAT(15),
            Electricity_Bill FLOAT(50),
            Additional_Bill INT(10),
            Service_Charge INT(10)
            

            );";
             $conn->exec($mysqlcode);


            $mysqlcode="INSERT INTO apartment VALUES('$invoice_id','$building_name',' $flat_no','$rent','$gas_bill','$water_bill','$electricity_bill','$additional_bill','$service_charge')";
             $conn->exec($mysqlcode);
             
           
             

          // echo $mysqlcode;
         
              // $conn->exec($mysqlcode);
               echo"<script>location.assign('home.php');</script>";


               
     
      }
      else
      {
        //   echo "login failed 3";
          echo"<script>location.assign('invoice_form.php');</script>";
      }
?>