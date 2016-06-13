<?php
//$Conexion es la variable donde se almacena la conexion
$conexion = mysqli_connect("localhost", "root", "1234") 
or die ("Fallo en el establecimiento de la conexión");

mysqli_select_db($conexion,"wordpress")
or die("Error en la selección de la base de datos");



$insert= mysqli_query($conexion,"insert into chat (username,destinatario,fecha,asunto,mensaje) values
	('$_REQUEST[usuario]','$_REQUEST[destinatario]','$_REQUEST[fecha]','$_REQUEST[asunto]','$_REQUEST[mensaje]')") or die ("problemas en el select".mysql_error());
//cuidado al utilizar el caracter "-" o la palabra "password", no lo guarda en la base de datos, posible palabra reservada?
if(!$insert){
	echo "Error al guardar datos";
}else{
	echo "Datos Guardados";
}



//Cerramos la conexión



mysqli_close($conexion);

header("Location:".$_SERVER['HTTP_REFERER']);  

?>
