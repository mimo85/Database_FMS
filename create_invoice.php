

<?php
     session_start();

     if($_SESSION["isLoggedin"]==true)
     {
?>

<?php
     if(isset($_GET['d_client'])&&isset($_GET['d_building']) ){

     
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
      $mysqlquery="SELECT Total_Bill FROM invoice
                   WHERE Flat_No= '$flat_no' AND Building_Name='$building_name' AND Status ='unpaid'";

     
      $result=$conn->query($mysqlquery); 
       
      $table=$result->fetchAll();
     // print_r($table);
    // print_r($result);

    $previous_bill=0;
    
    $due_charge=0;
    if (count($table)>0 ){ 
        $table_length=count($table);
        $i=$table_length-1;
      //privious bill is arrear  
      $due_charge=500;
     $previous_bill=$table[$i]['Total_Bill'];
    }
      print_r($previous_bill);



}
     // echo"<script>location.assign('building_list.php');</script>";  

     $mysqlquery="SELECT *  
     FROM apartment 
      WHERE Flat_No= '$flat_no' AND Building_Name='$building_name'
      ";

       $result=$conn->query($mysqlquery); 
       
       $table=$result->fetchAll();

       $current_bill=0;
       $total_bill=0;

       if(count($table)>0){
           $current_bill=$table[0]['Rent']+$table[0]['Water_Bill']+$table[0]['Gas_Bill']+$table[0]['Electricity_Bill']+$table[0]['Additional_Bill']+$table[0]['Service_Charge'];
      
        }
        print_r($current_bill);
        $total_bill=$current_bill+$previous_bill+$due_charge;
        print_r($total_bill);

        $mysqlquery="SELECT username  FROM client_info 
        WHERE Flat_no= '$flat_no' AND Building_name='$building_name'";


         $result=$conn->query($mysqlquery); 
         
         $table=$result->fetchAll();
         $username="";
        
         if(count($table)>0){
             $username=$table[0]['username'];
             
         }
         print_r($username);



         $current_month= date('F');
         $current_date= date('Y-m-d');
         $due_date= date('Y-m-d', strtotime("+10 day"));

         $mysqlcode="INSERT INTO invoice (Building_Name,Flat_No,Client_Username,Billing_Month,Issue_Date,Due_Date,Current_Bill,Arrear,Due_Charge,Status,Total_Bill)
                    VALUES('$building_name','$flat_no','$username','$current_month','$current_date','$due_date','$current_bill','$previous_bill','$due_charge','unpaid','$total_bill');
                    ";
                //connecting with bd
               
                $conn->exec($mysqlcode);
                echo ("okkk");
           

     }
?>


