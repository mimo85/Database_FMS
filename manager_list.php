<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manager List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>All Managers</h2>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Building Name</th>
        <th>Manager Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone no </th>
        <th>Email</th>
        <th>Joining Date</th>
        <th>Update/Delete</th>
        
      </tr>
    </thead>
    <tbody>
      <?php 
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

        $mysqlquery="SELECT*
                     FROM manager_info";
        
        $result=$conn->query($mysqlquery);
        $table=$result->fetchAll();
        for($i=0;$i<count($table);$i++)
        {
            $row=$table[$i];
      ?> 

            <tr>
                <td><?php echo $row['building_name']?></td>
                <td><?php echo $row['Manager_id']?></td>
                <td><?php echo $row['first_name']?></td>
                <td><?php echo $row['last_name']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['joining_date']?></td>
                <td>
                    <input type="button" value="Update" onclick="updatefn('<?php echo $row['Manager_id'] ?>');">
                    <input type="button" value="delete" onclick="deletefn('<?php echo $row['Manager_id'] ?> ');">
                </td>

            </tr> 
      <?php

        }

      ?>
      
    </tbody>
  </table>
</div>

<script>
      function deletefn(del_B)
      {
        var choice=confirm("Do you want to delete this?");
        if(choice)
        {
          location.assign("delete_manager_info.php?d_id="+del_B);
        }
      }

      function updatefn(update_B)
      {
        location.assign("update_manager_info.php?update_id="+update_B);
      }
</script>

</body>
</html>
