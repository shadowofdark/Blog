<?php
//$Conexion es la variable donde se almacena la conexion
$conexion = mysqli_connect("localhost", "root", "1234") 
or die ("Fallo en el establecimiento de la conexión");

mysqli_select_db($conexion,"wordpress")
or die("Error en la selección de la base de datos");



$insert= mysqli_query($conexion,"insert into datos (fk_usuario,fecha,titulo,contenido) values('$_REQUEST[usuario]','$_REQUEST[fecha]','$_REQUEST[titulo]','$_REQUEST[contenido]')") or die ("problemas en el select".mysqli_error());
//cuidado al utilizar el caracter "-" o la palabra "password", no lo guarda en la base de datos, posible palabra reservada?
if(!$insert){
	echo "Error al enviar consulta";
}else{
	echo "Consulta enviada";
}



//Cerramos la conexión



mysqli_close($conexion);


header("Location:".$_SERVER['HTTP_REFERER']);  

?>
