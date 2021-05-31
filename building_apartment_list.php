<?php
     session_start();

     if($_SESSION['isLoggedin']==true)
  {
    $building_name="";  
    if(isset($_GET['b_name'])) $building_name=$_GET['b_name'];




  ?>
  <!DOCTYPE html>
     <html lang="en">
       <head>
           <title>Building apartment List</title>
             <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
         </head>
  <body>  
        <div class="container">
            <h2>BUILDING Apartment LIST</h2>
            <p>Building Name: <?php echo $building_name ?></p>   
            <input type="button"  value="Add New Apartment" onclick="add_apartmentfn('<?php echo $building_name?>')">         
        <table class="table table-hover">
          <thead>
              <tr>
                  <th>Apartment No</th>
                  <th>Rent</th>
                  <th>Water Bill</th>
                  <th>Gas Bill</th>
                  <th>Electricity Bill</th>
                  <th>Additional Bill</th>
                  <th>Service Charge</th>
                  

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

                $mysqlquery="SELECT * FROM apartment
                             WHERE Building_Name='$building_name' ";
                             
                $result=$conn->query($mysqlquery); //result object
                //reading the whole table
                $table=$result->fetchAll();
                // print_r($table);
            for($i=0;$i<count($table);$i++){
             $row=$table[$i];
           ?>
          <tr>
            <td><?php echo $row['Flat_No']?></td>    
            <td><?php echo $row['Rent']?></td>
            <td><?php echo $row['Water_Bill']?></td>
            <td><?php echo $row['Gas_Bill']?></td>    
            <td><?php echo $row['Electricity_Bill']?></td>
            <td><?php echo $row['Additional_Bill']?></td>
            <td><?php echo $row['Service_Charge']?></td>
           
         </tr>
         <?php
         
        }

         ?>
       </tbody>
       </table>
         <a href="home.php">Back to Home!</a>
      </div>
          <script>

          function deletefn(del_b){
           var choice=confirm("Do you want to delete this");
           if(choice)
        {
          location.assign("delete_building.php?d_id="+del_b);
        }
        }

          function updatefn(up_b){
           location.assign("update_building.php?update_id="+up_b);
        }

          function add_apartmentfn(info_b){
           location.assign("add_apartment_form.php?b_name="+info_b);

        }

        function apartment_detailsfn(info_b){
           location.assign("building_apartment_list.php?b_name="+info_b);

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