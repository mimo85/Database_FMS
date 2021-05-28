<?php
     session_start();

     if($_SESSION['isLoggedin']==true)
     {
?>

<!DOCTYPE html>
         <html>
             <head>
                 <meta charset="utf-8">
                 <title> Dashboard </title>
         
             </head>
         
             <body>
                 HELLO MIMO
                 <br/>
                 <a href="logout.php">Click to logout</a>
             </body>
         </html>

<?php
     }
     else {
        echo"<script>location.assign('index.php');</script>";
     }
?>