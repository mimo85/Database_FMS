
<?php 
session_start();

if($_SESSION['isLoggedin']==true)
{
      if(isset($_POST['name']) && isset($_POST['address'])&& isset($_POST['no_of_flats']))
      {
          $n=$_POST['name'];
          $f=$_POST['no_of_flats'];
          $a=$_POST['address'];
         
          //database connection
          try{
              $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp","root","");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
          }
          catch(PDOException $ex){
            ?>
            
            <script>location.assign('building_form.php');</script>

            <?php
          }


        
          //  creating building table
          $mysqlcode="CREATE TABLE IF NOT EXISTS building(
            Building_name VARCHAR(50),
            No_of_flats VARCHAR(10),
            Address VARCHAR(50)
            
            )" ;
               //echo $mysqlcode;
               //connecting with db
               $conn->exec($mysqlcode);

        //inserting values into building table

         $mysqlcode="INSERT INTO building
                     VALUES('$n','$f','$a')
                    ";
                //connecting with bd
               $conn->exec($mysqlcode);

               echo"<script>location.assign('home.php');</script>";      
     
          }
      else
          {
       ?>
          <script>location.assign('building_form.php');</script>
       <?php
          }
          }
      else{
       ?>
            <script>location.assign('login.php');</script>
       <?php  
          }
        ?>