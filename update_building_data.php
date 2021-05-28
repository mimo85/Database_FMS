<?php
     session_start();

     if($_SESSION["isLoggedin"]==true)
     {
?>

<?php
       if (isset($_POST['name']) && isset($_POST['address'])  && isset($_POST['no_of_flats']) && isset($_POST['up_id']))
        {
           $n=$_POST['name'];
           $f=$_POST['no_of_flats'];
           $a=$_POST['address'];
           $u_id=$_POST['up_id'];
           
          

           try
           {
               $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp", "root", "");
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           } 
           catch (PDOException $ex) {
?>

           <script> 
                alert("Database connection error");
           </script>
<?php
           }

           $mysqlquery="UPDATE building
                              SET Building_name='$n',
                                  No_of_flats='$f',
                                  Address='$a'
                              Where Building_name='$u_id'";

           $conn->exec($mysqlquery);
           echo"<script>location.assign('building_list.php');</script>";
       }            
?>
 


<?php
     }
     else {
?>
        <script>location.assign('login.php');</script>
<?php        
     }
?>