<?php 
   include("conexion.php");

   $id = $_GET['id'];

   $modificar = $miPDO->prepare("SELECT *FROM tb_tareas where id_tarea = '$id';");
   $modificar->execute();
   
   $datos = $modificar->fetch(PDO::FETCH_ASSOC);

   $materia = $datos['materia'];
   $tarea = $datos['tarea'];
   $rubrica = $datos['rubrica'];
   $fecha = $datos['fecha_entrega'];


?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>
    

    <body>
    	
    	<?php include("barra.php");?>
    	<div class ="row ">

    	<div class ="col" style ="background:#9598DE;">

    	<form method="GET" action ="modificacion.php" style ="width: 100%; padding: 30px;">
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Nombre materia </label>
			     <input name ="id" type="text" class="form-control" value ="<?=$id?>" style ="display: none;">
			    <input name ="materia" type="text" class="form-control" value ="<?=$materia?>">
			  </div>

			  <div class="form-group">
			    <label for="exampleFormControlInput2">Nombre de la tarea </label>
			    <input name ="tarea" type="text" class="form-control" value ="<?=$tarea?>" >
			  </div>

              <div class="form-group">
                 <label for="exampleFormControlInput3">Archivo PDF</label>
                <input name ="rubrica" type="file" class="form-control" value="<?=$rubrica?>" >
              </div>

			  <div class="form-group">
				    <label for="exampleFormControlInput4">Fecha de entrega</label>
				    <input name ="fecha" type="text" class="form-control" value ="<?=$fecha?>" >
			  </div>
              
              <br>
			  <button type ="submit" class="btn btn-outline-success">Modificar</button>
        </form>

         </div>

         <div class ="col">
          	<section>
         	<img src ="icono.jpg" style ="height: 400px; width: 400px;">
            </section>    
         </div> 


        </div>



    <footer class="container-fluid text-center p-3" style ="color:Gray;">
        <p>Todos los derechos reservados 2022</p>
    </footer>
    </body>


</html>




