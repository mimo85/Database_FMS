<?php
     session_start();

     if($_SESSION['isLoggedin']==true)
     {
?>

<?php 
   if(isset($_GET['d_id'])) $delete_no=$_GET['d_id'];

               try{
                   $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp","root","");
                   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   //echo"ok";
    
                 }
               catch(PDOException $ex){
            ?>
                                        <script>
                                         alert("Database connection failed");
                                        </script>

             <?php
                                      }
             $mysqlquery="Delete from building
                         where Building_name='$delete_no'";
                         $conn->exec($mysqlquery);
              ?>
                  <script>location.assign('building_list.php');</script>
              <?php
          }
     else {
              ?>
                  <script>location.assign('login.php');</script>
             <?php        
          }
            ?>