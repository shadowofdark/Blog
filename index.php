<?php


      session_name('data');
       session_start();

     $usuario = $_SESSION['user_login'];

     $estado = $_SESSION['user_status'];
	$nombre = $_SESSION['user_nicename'];



if(isset($usuario)){
    echo "Bienvenido,",$usuario;}


$conexion = mysqli_connect("localhost","root","1234") 
                    or  die("Problemas en la conexion");

mysqli_select_db($conexion,"wordpress") or  die("Problemas en la selección de la base de datos");





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
                        <li class="active"><a href="index.php">Home</a></li>

                       <li><a href="mensajes.php">Mensajes</a></li>
                       <li><a href="archivos.php">Archivos</a></li>
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
        
       
        
        
        
         <!-- VENTANA MODAL AGREGAR ENTRADA -->
        
        <div class="modal fade" id="Agregar" tabindex="-1" role="dialog" aria-labelledby="ModalContactLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" align="center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                        <h1>Agregar entrada al Blog</h1>
                    </div>
                    
                    <form action="agregarEntrada.php" method="post">
                        
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
                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px">
                            <input class="form-control" name="titulo" placeholder="Titulo" type="text" required/>
                            
                            </div>
                            

                        </div>
                         <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px;">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="Contenido..." rows="6" name="contenido" required></textarea>
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
        
    <div class="container" style="margin-top: 60px;">

        <div class="blog-header">
        <h1 class="blog-title">Bienvenidos al Blog!</h1>
        <p class="lead blog-description">Este sitio esta configurado para trabajar colaborativamente.</p>
        <button type="button"  data-toggle="modal" data-target="#Agregar" class="btn btn-primary" style="margin-left:50%;" >Crear Entrada</button>
            
            
      </div>
        
        <div class="row">
            
            
            <div class="col-sm-2 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>Acerca</h4>
            <p>Blog CSCW desarrollado e ingeniado por Daniela Garro y Elio Togno</p>
          </div>
          <div class="sidebar-module">
            <h4>Usuarios en Linea</h4>
             
              <ol class="list-unstyled">
              <?php
                  
                  
    $estado =1;
                  
                 
		 
                  
              $resultCons = mysqli_query($conexion,"SELECT * FROM wp_users WHERE user_status= '$estado'"); 

              $datosCons = mysqli_fetch_array($resultCons,MYSQLI_ASSOC);
    
    while($datosCons)
{
        echo "<li><a>".$datosCons['user_nicename']."</a></li>";
        $datosCons = mysqli_fetch_array($resultCons,MYSQLI_ASSOC);
    }
                  
                //$conexion = mysqli_connect("localhost","root","1234") 
                  //  or  die("Problemas en la conexion");
	mysqli_free_result($resultCons);
	
                  ?>
    
            </ol>
          </div>
          
        </div><!-- /.blog-sidebar -->
            <div class="col-sm-6 blog-main" style="margin-left:70px;">
        <?php 
                   
                  

                  
                  $result = mysqli_query($conexion,"SELECT * FROM datos");

                  $datosCons1 = mysqli_fetch_array($result);
                  
                  
while($datosCons1!=NULL){
    

//echo "<div class='col-sm-6 blog-main'";
echo "<div class='blog-post'>";    
 echo "<h2 class='blog-post-title'>".$datosCons1['titulo']."</h2>";       
    echo "<p class='blog-post-meta'>".$datosCons1['fecha']." creado por <a href='#'>".$datosCons1['fk_usuario']."</a></p>";
    echo "<p>".$datosCons1['contenido']."<p>";
    echo "</div>";

$datosCons1 = mysqli_fetch_array($result);

  

}
?>



</div>
       

        

      </div><!-- /.row -->

        
      
        
    </div><!-- /.container -->

        
        
        
       
  </body>
</html>
