<?php
     session_start();

     if($_SESSION["isLoggedin"]==true)
     {
?>

<?php
     if(isset($_GET['d_client'])&&isset($_GET['d_building'])){

     
     $delete_c=$_GET['d_client'];
     $delete_b=$_GET['d_building'];
     try{
          $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp","root","");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo"ok";
         }    
         catch(PDOException $ex){
?>

         <script> 
              alert("Database connection error");
         </script>
<?php
      }
      $mysqlquery="DELETE FROM client_info 
                   WHERE flat_no= '$delete_c' AND building_name='$delete_b'";

      $conn->exec($mysqlquery);
      echo"<script>location.assign('building_list.php');</script>";             
?>


<?php
     }
    }
     else {
?>
        <script>location.assign('login.php');</script>
<?php        
     }
?>