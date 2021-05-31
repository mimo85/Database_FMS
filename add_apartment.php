<?php 

   echo $_POST['building_name'];
   echo $_POST['flat_no'];

      if(isset($_POST['building_name'])&& isset($_POST['flat_no'])&& isset($_POST['rent'])&& isset($_POST['gas_bill'])&& isset($_POST['water_bill'])&& isset($_POST['electricity_bill'])&& isset($_POST['additional_bill'])&& isset($_POST['service_charge']))
      {
          $rent=$_POST['rent'];
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
            echo "login failed 1";
            echo"<script>location.assign('building_form.php');</script>";
          }
      


            $mysqlcode="INSERT INTO apartment (Building_Name,Flat_No,Rent,Water_Bill,Gas_Bill,Electricity_Bill,Additional_Bill,Service_Charge)
             VALUES('$building_name','$flat_no','$rent','$water_bill','$gas_bill','$electricity_bill','$additional_bill','$service_charge')";
             $conn->exec($mysqlcode);
             
           
             

          // echo $mysqlcode;
         
              // $conn->exec($mysqlcode);
               echo "<script> 
               location.assign('building_list.php')
               </script>";


               
     
      }
    
     
?>
    