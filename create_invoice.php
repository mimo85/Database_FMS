<?php
     session_start();

     if($_SESSION["isLoggedin"]==true)
     {
?>

<?php
     if(isset($_GET['d_client'])&&isset($_GET['d_building']){

     
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
    
    $due_charge=500;
    if (count($table)>0 ){ 
        $table_length=count($table);
        $i=$table_length-1;
        
     $previous_bill=$table[$i]['Total_Bill']+$due_charge;
    }
      print_r($previous_bill);

      $mysqlquery="SELECT Total_Bill FROM invoice
      WHERE Flat_No= '$flat_no' AND Building_Name='$building_name' AND Status ='unpaid'";


$result=$conn->query($mysqlquery); 

$table=$result->fetchAll();
// print_r($table);
// print_r($result);

$arrear=0;
if (count($table)>0 ){ 
$table_length=count($table);
$i=$table_length-1;

$arrear=$table[$i]['Total_Bill'];
}
     // echo"<script>location.assign('building_list.php');</script>";  

     $mysqlquery="SELECT *  FROM apartment 
      WHERE Flat_no= '$flat_no' AND Building_name='$building_name'";
       $result=$conn->query($mysqlquery); 
       
       $table=$result->fetchAll();

       $current_bill=0;
       if(count($table)>0){
           $current_bill=$table[0]['Rent']+$table[0]['Water_bill']+$table[0]['Gas_bill']+$table[0]['Electricity_bill']+$table[0]['Additional_bill']+$table[0]['Service_charge'];
      
        }
        print_r($current_bill);
        $current_bill=$current_bill+$previous_bill;
        print_r($current_bill);

        $mysqlquery="SELECT username  FROM client_info 
        WHERE Flat_no= '$flat_no' AND Building_name='$building_name'";


         $result=$conn->query($mysqlquery); 
         
         $table=$result->fetchAll();
         $username="";
         if(count($table)>0){
             $username=$table[0]['username'];
             
         }
         print_r($username);

           $mysqlquery="SELECT Rent,Water_bill, Electricity_bill,Gas_bill,Additional_bill,Service_charge
           FROM apartment 
           WHERE Flat_no= '$flat_no' AND Building_Name='$building_name'";
   
   
            $result=$conn->query($mysqlquery); 
            $table=$result->fetchAll();

            $Water_bill=0;
            if(count($table)>0){
                $Water_bill=$table[0]['Water_bill'];}
                print_r('water');
                print_r($Water_bill);

                $Rent=0;
                if(count($table)>0){
                    $Rent=$table[0]['Rent'];}

            $Electricity_bill=0;
            if(count($table)>0){
                $Electricity_bill=$table[0]['Electricity_bill'];}

            $Gas_bill=0;
            if(count($table)>0){
                $Gas_bill=$table[0]['Gas_bill'];}
         
           $Additional_bill=0;
           if(count($table)>0){
               $Additional_bill=$table[0]['Additional_bill'];}

               $Service_charge=0;
               if(count($table)>0){
                   $Service_charge=$table[0]['Service_charge'];}
    
           
                
          
 

         $current_month= date('F');
         $current_date= date('Y-m-d');
         $due_date= date('Y-m-d', strtotime("+10 day"));

         $mysqlcode="INSERT INTO invoice (Building_Name,Flat_No,Client_Username,Billing_Month,Issue_Date,Due_Date,Rent,Water_Bill,Electricity_Bill,Gas_Bill,Additional_Bill,Service_Charge,Arrear,Due_Charge,Status,Total_Bill)
                    VALUES('$building_name','$flat_no','$username','$current_month','$current_date','$due_date','$Rent','$Water_bill','$Electricity_bill','$Gas_bill','$Additional_bill','$Service_charge','$arrear','$due_charge','unpaid','$current_bill');
                    ";
                //connecting with bd
               
                $conn->exec($mysqlcode);
                echo ("okkk");
           


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