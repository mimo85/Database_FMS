<?php
     session_start();

     if($_SESSION["isLoggedin"]==true)
     {
?>

<?php
       if (isset($_POST['first_name']) && isset($_POST['last_name'])  && isset($_POST['email']) 
       && isset($_POST['phone']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['building_name'])
       && isset($_POST['flat_no'])  && isset($_POST['up_flat_no']) && isset($_POST['up_id']))
        {
            $flat_no=$_POST['flat_no'];
            $f_name=$_POST['first_name'];
            $l_name=$_POST['last_name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $building_name=$_POST['building_name'];
            $u_id=$_POST['up_id'];
            $f_id=$_POST['up_flat_no'];

     
          

           try
           {
               $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp", "root", "");
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           } catch (PDOException $ex) {
?>

           <script> 
                alert("Database connection error");
           </script>
<?php
           }

           $mysqlquery="UPDATE client_info
                        SET flat_no='$flat_no',
                            f_name='$f_name',
                            l_name='$l_name',
                            email='$email',
                            phone='$phone',
                            username='$username',
                            password='$password',
                            building_name='$building_name'
                            Where building_name='$u_id'  AND flat_no='$f_id'";

           $conn->exec($mysqlquery);
           echo"<script>location.assign('building_list.php');</script>";
       }            
?>
 


<?php
     }
     else {
?>
        <script>location.assign('adminlogin.php');</script>
<?php        
     }
?>