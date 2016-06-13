<?php
$conexion=mysqli_connect("localhost","root","1234") 
  or  die("Problemas en la conexion");

mysqli_select_db($conexion,"wordpress") 
  or  die("Problemas en la selección de la base de datos");



	$user= $_POST['username'];
	$pass= $_POST['password'];
    $estado = 1;

	$b_user=mysqli_query($conexion,"SELECT * FROM wp_users WHERE user_login='$user'");
	$ses = mysqli_fetch_assoc($b_user);

	if(mysqli_num_rows($b_user)){

		if($ses['password']==$pass){


            session_name('data');
			session_start();

             $update= mysqli_query($conexion,"UPDATE wp_users SET user_status='$estado' WHERE user_login='$user'") or die ("No se pudo modificar el estado de usuario");

            $_SESSION['user_login']=$user;
            $_SESSION['user_status']= $estado;
            $_SESSION['user_nicename']= $nombre;


			header('Location:index.php');
		}else{
			echo 'Nombre de ususario/Clave incorrecta';
		}
	}else{
		echo 'Nombre de usuario/clave incorrecta';
	}


?>
