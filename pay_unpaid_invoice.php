<?php

        $flat_no="";
        $building_name="";
        $invoice_no="";
        if(isset($_GET['d_client'])&&isset($_GET['d_building'])&&isset($_GET['invoice_no'])){

            $flat_no=$_GET['d_client'];
            $building_name=$_GET['d_building'];
            $invoice_no=$_GET['invoice_no'];
            echo $flat_no;
            echo $building_name;
            echo $invoice_no;
        }
        try{
            $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo"ok";
     
         }
         catch(PDOException $ex){
          ?> 
              <script> alert("Database connection failed"); </script>
          <?php
        }


         $mysqlquery="UPDATE invoice
           SET Status = 'paid'
           WHERE Flat_No='$flat_no' AND Building_Name='$building_name'
           ";
            $conn->exec($mysqlquery);
            echo"<script>
            window.alert('Successfully paid');
            location.assign('building_list.php');
            
            </script>";


?>