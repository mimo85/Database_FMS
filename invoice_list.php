<?php
     session_start();

     if($_SESSION['isLoggedin']==true)
  {
  ?>
  <!DOCTYPE html>
     <html lang="en">
       <head>
           <title>Building List</title>
             <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
         </head>
  <body>  
        <div class="container">
            <h2>Invoice LIST</h2>
            <p></p>            
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>Invoice ID</th>
                    <th>Building Name</th>
                    <th>Flat_no</th>
                    <th>Client Usename</th>
                    <th>Billing Month</th>
                    <th>Issue Date</th>
                    <th>Due Date</th>
                    <th>Water Bill</th>
                    <th>Electricity Bill</th>
                    <th>Gas Bill</th>
                    <th>Additional Bill</th>
                    <th>Service charge </th>
                    <th>Arrearl</th>
                    <th>Due Charge </th>
                    <th>Total Bill</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
        <tbody>
            <?php
         try{
               $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp","root","");
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               // echo"ok";
        
            }
            catch(PDOException $ex){
             ?> 
                 <script> alert("Database connection failed"); </script>
             <?php
                                  }


         $mysqlquery="SELECT * FROM invoice
            WHERE  Status ='unpaid'";
             $result=$conn->query($mysqlquery); 
              //reading the whole table
              $table=$result->fetchAll();
                    // print_r($table);
                for($i=0;$i<count($table);$i++){
                $row=$table[$i];
           ?>
          <tr>
            <td><?php echo $row['Invoice_no']?></td>
            <td><?php echo $row['Building_Name']?></td>
            <td><?php echo $row['Flat_No']?></td>
            <td><?php echo $row['Client_Username']?></td>
            <td><?php echo $row['Billing_Month']?></td>
            <td><?php echo $row['Issue_Date']?></td>
            <td><?php echo $row['Due_Date']?></td>
            <td><?php echo $row['Water_Bill']?></td>
            <td><?php echo $row['Electricity_Bill']?></td>
            <td><?php echo $row['Gas_Bill']?></td>
            <td><?php echo $row['Additional_Bill']?></td>
            <td><?php echo $row['Service_Charge']?></td>
            <td><?php echo $row['Arrear']?></td>
            <td><?php echo $row['Due_Charge']?></td>
            <td><?php echo $row['Total_Bill']?></td>
            <td><?php echo $row['Status']?></td>
       
           <td>   <input type="button" value="Paid" onclick="paidfn($row['flat_no'] ,$row['building_name'], $row['Invoice_no'] );">
           </td>
      
         </tr>
         <?php
         
        }

         ?>
       </tbody>
       </table>
         <a href="home.php">Back to Home!</a>
      </div>
          <script>

function paidfn(del_c,del_b){
     var del_c=del_c;
     var del_b=del_b;
     location.assign("invoice_list_data.php?d_client="+ del_c+ "&d_building="+del_b);

}
          </script>
 </body>

</html>
   <?php
          }
     else {
?>
        <script>location.assign('login.php');</script>
<?php        
         }
?>