<?php 
      if(isset($_POST['email']) && ($_POST['password']))
      {
          $e=$_POST['email'];
          $p=$_POST['password'];

          try{
              $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp","root","");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
          }
          catch(PDOException $ex){
            // echo "login failed 1";
            echo"<script>location.assign('login.php');</script>";
          }

          $mysqlcode=" SELECT* 
                       FROM admin 
                       WHERE Email='$e' and Password='$p' 
                     ";

          $result=$conn->query($mysqlcode);
        //   echo "row count is ". $result->rowCount();
          if($result->rowCount()==1)
          {
              session_start();
              $_SESSION["isLoggedin"]=true;
            //   echo "login success"; 
              echo"<script>location.assign('home.php');</script>";
          }
          else
          {
            //   echo "login failed 2";
             echo"<script>location.assign('login.php');</script>";
          }
      }
      else
      {
        //   echo "login failed 3";
          echo"<script>location.assign('login.php');</script>";
      }
?>