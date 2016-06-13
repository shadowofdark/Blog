<?php


      session_name('data');
       session_start();
    
     $usuario = $_SESSION['username'];
     
    
     



if(isset($usuario)){
    echo "Bienvenido,",$usuario;}


$conexion = mysql_connect("localhost","root","") 
                    or  die("Problemas en la conexion");

mysql_select_db("blog", $conexion) 
                    or  die("Problemas en la selección de la base de datos");
    



# Comprovamos que se haya enviado algo desde el formulario
if (is_uploaded_file($_FILES['file']['tmp_name'])) {
# Definimos las variables
$host = "192.168.77.85";
$port = 21;
$user = "root";
$password = "1234";
$ruta = "/home/ubuntu/archivos/";
$fecha = date("d") . " del " . date("m") . " de " . date("Y");
# Realizamos la conexion con el servidor
$conn_id = @ftp_connect($host, $port);
if ($conn_id) {
    # Realizamos el login con nuestro usuario y contraseña
    if (@ftp_login($conn_id, $user, $password)) {
        # Canviamos al directorio especificado
        if (@ftp_chdir($conn_id, $ruta)) {
            if (!@ftp_chdir($conn_id, $ruta . "/" . $_SESSION['username'])) {
                ftp_mkdir($conn_id, $ruta . "" . $_SESSION['username']); //echo "FC";
                $ruta = $ruta . "" . $_SESSION['username'];
                @ftp_chdir($conn_id, $ruta);
            } else {
                echo $ruta = $ruta . "" . $_SESSION['username'] . "/";
                @ftp_chdir($conn_id, $ruta);
            }
            # Subimos el fichero
            if (@ftp_put($conn_id, $_FILES["file"]["name"], $_FILES["file"]["tmp_name"], FTP_BINARY)) {
                echo "Fichero subido correctamente";
                $stmt = $db->prepare('INSERT INTO Files(direc, nombre, prop,hora,peso) VALUES (:direc, :nombre, :prop, :hora, :peso)');
                $stmt->execute(array(
                    ':direc' => "" . $ruta . "" . $_FILES['file']['name'],
                    ':nombre' => $_FILES['file']['name'],
                    ':prop' => $_SESSION['username'],
                    ':hora' => $fecha,
                    ':peso' => round($_FILES['file']['size']/1024)));
            } else
                echo "No ha sido posible subir el fichero";
        } else
            echo "No existe el directorio especificado";
    } else
        echo "El usuario o la contraseña son incorrectos";
    # Cerramos la conexion ftp
    ftp_close($conn_id);
} else
    echo "No ha sido posible conectar con el servidor";
}else {
echo "Selecciona un archivo...";
}
header('Location: memberpage.php');
?>

?>

<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <title Blog CSCW></title>
    
    <link href="CSS/blog.css" rel="stylesheet">
    <link href="CSS/bootstrap.css" rel="stylesheet">
    
    
    <script src="JS/bootstrap.js"></script>
          <script src="JS/jquery.js"></script>
          <script src="JS/jquery.flexslider.js"></script>
            <script src="JS/javascript.js"></script>
        <script src="JS/bootstrap-modal.js"></script>
    <script type="text/javascript" src="JS/jquery.scrollTo.min.js"></script>
    <script src="JS/admin.js" type="text/javascript"></script>
    
   

    
</head>

    <body>
    
         <!-- BARRA DE NAVEGACION -->
           <nav class="navbar navbar-inverse navbar-fixed-top">
               <div class="container">
                <div class="navbar-header">
                <a class="navbar-brand" align=left >CS-Blog-CW!</a>
                   </div>
                   <div id="navbar" class="collapse navbar-collapse">
                       
                       <!--Parte izquierda de Navbar -->
                   <ul class="nav navbar-nav">
                        <li ><a href="index.php">Home</a></li>
                        
                       <li><a href="mensajes.php">Mensajes</a></li>
                       <li class="active"><a  href="archivos.php">Archivos</a></li>
                       <li><a></a></li>
                       <li><a></a></li>
                       <li><a></a></li>
                       <li><a></a></li>
                       <li><a></a></li>
                       <li><a></a></li>
                       <li><a style="font-size:15px;">Hola <?php echo $usuario; ?>!</a></li>
                   </ul>
                       
                      
                       
                       <!--Parte derecha de Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="salir.php"><button class="btn btn-primary"  type="button" >Salir</button></a>
                        </li>
                       </ul>
                
                </div>
                </div>
               
               
            
        </nav>

        <!-- FIN BARRA DE NAVEGACION -->
        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["HTTP_SELF"]?>">
		<div>Fichero: <input type="file" name="file" id="file" maxlength="45"></div>
		<dif><input type="submit" name="enviar" value="enviar"/></div>
	</form>
        
    </body>
</html>
