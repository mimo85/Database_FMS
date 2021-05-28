<?php 
      if(isset($_POST['first_name']) && isset($_POST['last_name'])&& isset($_POST['email'])&& isset($_POST['phone'])&& isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['building_name'])&& isset($_POST['flat_no']))
      {
          $f_name=$_POST['first_name'];
          $l_name=$_POST['last_name'];
          $email=$_POST['email'];
          $phone=$_POST['phone'];
          $username=$_POST['username'];
          $password=$_POST['password'];
          $building_name=$_POST['building_name'];
          $flat_no=$_POST['flat_no'];
          $client_type=$_POST['client_type'];
         
         

          try{
              $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp","root","");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
          }
          catch(PDOException $ex){
             //echo "login failed 1";
            echo"<script>location.assign('building_form.php');</script>";
          }
        
          $mysqlcode="CREATE TABLE IF NOT EXISTS client_info(
            flat_no VARCHAR(10),
            f_name VARCHAR(50),
            l_name VARCHAR(50),
            email VARCHAR(50),
            phone VARCHAR(12),
            username VARCHAR(15),
            password VARCHAR(10),
            building_name VARCHAR(50),
            client_type VARCHAR(10)
            );";
             
             $conn->exec($mysqlcode);
          // echo $mysqlcode;
         
          $mysqlcode="INSERT INTO client_info VALUES('$flat_no','$f_name','$l_name','$email','$phone','$username','$password',
          '$building_name','$client_type')";
          $conn->exec($mysqlcode);
          echo"<script>location.assign('home.php');</script>";    
     
      }
      else
      {
        //   echo "login failed 3";
          echo"<script>location.assign('building_form.php');</script>";
      }
?>