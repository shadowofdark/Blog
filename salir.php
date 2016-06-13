<?php 

session_name('data');
       session_start();
    
$usuario=$_SESSION['user_login'];

$conexion = mysqli_connect("localhost","root","1234") 
                    or  die("Problemas en la conexion");

mysqli_select_db($conexion,"wordpress") 
                    or  die("Problemas en la selección de la base de datos");

     
    $estado=0;
     session_destroy();
       
        $update= mysqli_query($conexion,"UPDATE wp_users SET user_status='$estado' WHERE user_login='$usuario'");
       
       //echo "Has cerrado la sesion";
header('Location: Login.php');
       
   
?>
