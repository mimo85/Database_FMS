<?php 
      if(isset($_POST['first_name']) && isset($_POST['last_name'])&& isset($_POST['email'])&& isset($_POST['building_name'])&& isset($_POST['joining_date'])&& isset($_POST['Manager_id']))
      {
          $f_name=$_POST['first_name'];
          $l_name=$_POST['last_name'];
          $email=$_POST['email'];
          $phone=$_POST['phone'];
          $building_name=$_POST['building_name'];
          $joining_date=$_POST['joining_date'];
          $Manager_id=$_POST['Manager_id'];
          
         
         

          try{
              $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp","root","");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
          }
          catch(PDOException $ex){
             //echo "login failed 1";
            echo"<script>location.assign('building_form.php');</script>";
          }
        
            
             
            
          // echo $mysqlcode;
          $mysqlcode="CREATE TABLE IF NOT EXISTS manager_info(
            building_name VARCHAR(50),
            Manager_id VARCHAR(50),
            first_name VARCHAR(50),
            last_name VARCHAR(50),
            phone VARCHAR(12),
            email VARCHAR(20),
            joining_date DATE
            
            )" ;

           //echo $mysqlcode;
         
               $conn->exec($mysqlcode);
         
          $mysqlcode="INSERT INTO manager_info VALUES('$building_name','$Manager_id','$f_name','$l_name','$phone','$email',
          '$joining_date')";
          $conn->exec($mysqlcode);
          echo"<script>location.assign('home.php');</script>";    
     
      }
      else
      {
           echo "login failed 3";
        //  echo"<script>location.assign('building_form.php');</script>";
      }
?>