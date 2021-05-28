<?php
     if(isset($_GET['d_client'])&&isset($_GET['d_building'])){

     
     $flat_no=$_GET['d_client'];
     $building_name=$_GET['d_building'];
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