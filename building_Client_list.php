<!DOCTYPE html>
<html lang="en">
<head>
  <title>Building client List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>BUILDING CLIENT LIST</h2>
  <p></p>            
  <table class="table table-hover">
    <thead>
      <tr>
     
        <th>Flat No</th>
        <th>Frist Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Username</th>
        <th>Password</th>
        <th>Building Name</th>
        <th>Client Type</th>
        <th>Update/Delete</th>
        
       
      </tr>
    </thead>
    <tbody>
<?php
     session_start();

     if($_SESSION['isLoggedin']==true)
 {
             ?>

            <?php 
           if(isset($_GET['b_name'])) $building_name=$_GET['b_name'];

          try{
    $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       echo"ok";
    
          }
       catch(PDOException $ex){
         ?>
     <script>
     alert("Database connection failed");
     </script>

     <?php
        }


              $mysqlquery="SELECT * FROM client_info
               Where building_name='$building_name'";
 
               $result=$conn->query($mysqlquery); 

               $table=$result->fetchAll();
              // print_r($table);
              for($i=0;$i<count($table);$i++){
               $row=$table[$i];
               ?>
               <tr>
               <td><?php echo $row['flat_no']?></td>
               <td><?php echo $row['f_name']?></td>
               <td><?php echo $row['l_name']?></td>
               <td><?php echo $row['email']?></td>
               <td><?php echo $row['phone']?></td>
               <td><?php echo $row['username']?></td>
               <td><?php echo $row['password']?></td>
               <td><?php echo $row['building_name']?></td>
               <td><?php echo $row['client_type']?></td>
               <td>
                    <input type="button" value="Update" onclick="updatefn('<?php echo $row['flat_no'] ?>','<?php echo $row['building_name'] ?>');">
                    <input type="button" value="delete" onclick="deletefn('<?php echo $row['flat_no'] ?>','<?php echo $row['building_name'] ?>');">
                    <input type="button" value="create_invoice" onclick="create_invoicefn('<?php echo $row['flat_no'] ?>','<?php echo $row['building_name'] ?>');">
                    <input type="button" value="show_unpaid_invoice" onclick="show_unpaid_invoicefn('<?php echo $row['flat_no'] ?>','<?php echo $row['building_name'] ?>');">

                </td>
              
               
               
              
               </tr>   
               <?php
              }
    ?>
    
    </tbody>
  </table>
  <li><a href="home.php">return</a></li>
</div> 
<script>
function deletefn(del_c,del_b){
    var choice=confirm("Do you want to delete this");
    if(choice)
        {
             var del_c=del_c;
             var del_b=del_b;
          location.assign("delete_client.php?d_client="+ del_c+ "&d_building="+del_b);
          //location.assign("delete_client.php?d_building="+del_b);
        }
}
function updatefn(del_c,del_b){
     var del_c=del_c;
     var del_b=del_b;
     location.assign("update_client.php?d_client="+ del_c+ "&d_building="+del_b);

}
function create_invoicefn(del_c,del_b){
     var del_c=del_c;
     var del_b=del_b;
     location.assign("create_invoice.php?d_client="+ del_c+ "&d_building="+del_b);

}
function show_unpaid_invoicefn(del_c,del_b){
  var del_c=del_c;
  var del_b=del_b;
     location.assign("show_unpaid_invoice.php?d_client="+ del_c+ "&d_building="+del_b);
     
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



