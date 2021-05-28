<?php
     session_start();

     if($_SESSION["isLoggedin"]==true)
     {
?>

<?php
       if (isset($_POST['first_name']) && isset($_POST['last_name'])  && isset($_POST['email']) && isset($_POST['phone'])
       && isset($_POST['Manager_id'])&& isset($_POST['building_name']) && isset($_POST['joining_date']) && isset($_POST['up_id']))
        {  
             
            $Manager_id=$_POST['Manager_id'];
            $f_name=$_POST['first_name'];
            $l_name=$_POST['last_name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $building_name=$_POST['building_name'];
            $joining_date=$_POST['joining_date'];
            $u_id=$_POST['up_id'];

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

           $mysqlquery="UPDATE manager_info
                        SET building_name='$building_name',
                        Manager_id='$Manager_id',
                            first_name='$f_name',
                            last_name='$l_name',
                            phone='$phone',
                            email='$email',
                            joining_date='$joining_date'
                            
                        Where Manager_id='$u_id'";

           $conn->exec($mysqlquery);
           echo"<script>location.assign('manager_list.php');</script>";
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