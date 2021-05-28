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
            <h2>BUILDING LIST</h2>
            <p></p>            
        <table class="table table-hover">
          <thead>
              <tr>
                  <th>Building Name</th>
                  <th>No_of_flats</th>
                  <th>Address</th>
                  <th>Update/Delete</th>

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

                $mysqlquery="SELECT * FROM building ";
                $result=$conn->query($mysqlquery); //result object
                //reading the whole table
                $table=$result->fetchAll();
                // print_r($table);
            for($i=0;$i<count($table);$i++){
             $row=$table[$i];
           ?>
          <tr>
             <td><input type="button" class="btn btn-link" value="<?php echo $row['Building_name']?>" onclick="show_listfn('<?php echo $row['Building_name']?>');"></td>
            <td><?php echo $row['No_of_flats']?></td>
            <td><?php echo $row['Address']?></td>
       
           <td>    <input type="button" value="Update" onclick="updatefn('<?php echo $row['Building_name']?> ');">
           <input type="button"  value="Delete" onclick="deletefn('<?php echo $row['Building_name']?>');">
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

          function show_listfn(info_b){
           location.assign("building_Client_list.php?b_name="+info_b);

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