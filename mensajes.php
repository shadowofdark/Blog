<?php
 session_name('data');
       session_start();
    
     $usuario = $_SESSION['user_login'];
     
     
     



if(isset($usuario)){
    echo "Bienvenido,",$usuario;}


$conexion = mysqli_connect("localhost","root","1234") 
                    or  die("Problemas en la conexion");

mysqli_select_db($conexion,"wordpress") 
                    or  die("Problemas en la selección de la base de datos");
    

    //Obtener fecha 
    
    $now = time();
$num = date("w");
if ($num == 0)
{ $sub = 6; }
else { $sub = ($num-1); }
$WeekMon  = mktime(0, 0, 0, date("m", $now)  , date("d", $now)-$sub, date("y", $now));
//monday week begin calculation
$todayh = getdate($WeekMon); //monday week begin reconvert

$d = $todayh['mday'];
$m = $todayh['mon'];
$y = $todayh['year'];
    
    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <title>Blog CSCW</title>
    
    
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
                        <li><a href="index.php">Home</a></li>
                        
                       <li><a href="perfil.php">Mi Perfil</a></li>
                       <li class="active"><a href="mensajes.php">Mensajes</a></li>
                       <li><a></a></li>
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
                    <li><a><button class="btn btn-primary"  type="button" action="salir.php" >Salir</button></a>
                        </li>
                       </ul>
                
                </div>
                </div>
               
               
            
        </nav>

        <!-- FIN BARRA DE NAVEGACION -->
        <div class="container">
        
        <button class="btn btn-danger" style="margin-top:80px; margin-left:40%;" data-toggle="modal" data-target="#enviar">enviar mensaje</button>
        </div>
        

         <table class="table table-bordered" style="margin-top:60px; margin-left:10%;">
              <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Fecha</th>
                  <th>Asunto</th>
                  <th width="500">Mensaje</th>
                  
                  
                </tr>
              </thead>
              <tbody>
                  
               <?php 
                   
                  
                  
                  
                  $resultCons = mysqli_query($conexion,"SELECT * FROM chat WHERE destinatario='$usuario'"); 

                  $datosCons = mysqli_fetch_array($resultCons);
                  
                  
while($datosCons)
{
    
    
echo "<tr>";
echo "<td>".$datosCons['username']."</td>";
echo "<td>".$datosCons['fecha']."</td>";
echo "<td>".$datosCons['asunto']."</td>";    


echo "<td width='800'>".$datosCons['mensaje']."</td>";


    

    
$datosCons = mysqli_fetch_array($resultCons);
echo "</tr>";


}?>
                  
                   <!-- VENTANA MODAL AGREGAR ENTRADA -->
        
        <div class="modal fade" id="enviar" tabindex="-1" role="dialog" aria-labelledby="ModalContactLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" align="center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                        <h1>Enviar Mensaje nuevo</h1>
                    </div>
                    
                    <form action="enviar.php" method="post">
                        
                    <div class="modal-body" align="center">
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6 col-sm-6" >
                            <input class="form-control" name="usuario" type="text" required readonly="readonly" value="<?php echo $usuario; ?>"/>
                            </div>
                        
                             <div class="col-lg-6 col-md-6 col-sm-6" >
                            <input class="form-control" name="fecha" type="text" required readonly="readonly" value="<?php echo "$d-$m-$y"; ?>"/>
                            </div>
                        </div>
                         <div class="row">
                             
                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 20px">
                                <label for="destinatario">Destinatario:</label>
                           <select class="form-control" name="destinatario">
                    <?php
                              
		$resultUsuarios = mysqli_query($conexion,"SELECT * FROM wp_users"); 

                  $datosUser = mysqli_fetch_array($resultUsuarios);
                  
                 
while($datosUser)
{  
    
    
                
	echo "<option value=",$datosUser['user_login'],">".$datosUser['user_login']."</option>";
    
        $datosUser = mysqli_fetch_array($resultUsuarios);
}
                        ?>
  
</select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px">
                            <input class="form-control" name="asunto" placeholder="Asunto" type="text" required/>
                            
                            </div>
                            

                        </div>
                         <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px;">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="Contenido..." rows="6" name="mensaje" required></textarea>
                                </div>
                        
                    </div>
                        </div>
                    
                    <div class="modal-footer" align="center">
                    <input type="submit" class="btn btn-success" value="Enviar" />
                    <input type="reset" class="btn btn-danger" value="Limpiar" />
                     <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Cerrar</button>   
                    </div>
                </form>
                </div>
            </div>
        </div>
        
        <!-- FIN VENTANA MODAL Agregar -->
                  
              </tbody>
            </table>
      
       
    </body>
