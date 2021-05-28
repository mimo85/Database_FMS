<?php
     session_start();

     if($_SESSION["isLoggedin"]==true)
     {
?>

<?php
     if(isset($_GET['d_id']))
     $delete_b=$_GET['d_id'];
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
      $mysqlquery="DELETE FROM manager_info 
                   WHERE Manager_id= '$delete_b'";

      $conn->exec($mysqlquery);
      echo"<script>location.assign('manager_list.php');</script>";             
?>


<?php
     }
     else {
?>
        <script>location.assign('login.php');</script>
<?php        
     }
?>