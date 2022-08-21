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


   <div class ="container" style ="background:#9598DE; width: 100%px; text-align: center;">
   	    <h2>Unidad ||| Resultado De aprendizaje</h2><br>
   	    <h3>Presenta : </h3>
   	    <p>Fernando Giovanni Sanchez Lopez</p>
   	    <p>Lizayda Vazques Zaraos</p>

   </div>

    <form class="row" method ="GET" action ="" style="padding: 30px;">
      <div class ="col-3">
       <input type="text" class="form-control" name="busca" placeholder="Buscar" style ="width: 100%;">
      </div>

       <div class="col">
       <button type ="submit"  class="btn btn-outline-primary">Buscar</button>
       </div>
    </div>



  <div class="table-responsive" style ="padding: 30px;">
	  <table class="table table-striped" style="background:white; color:black;">
	    <thead style ="background:#9598DE; color:white;">
	      <th scope ="col">ID</th>
	      <th scope ="col">Nombre Materia</th>
	      <th scope ="col">Nombre tarea</th>
	      <th scope ="col">Rubrica PDF</th>
	      <th scope ="col">Fecha de entrega</th>
	      <th scope ="col"></th>
	      <th>Opciones</th>
	    </thead>

	    <tbody>

	    <?php 

	       include("conexion.php");

           if(isset($_GET['busca']))
           {
           	    $condicion = $_GET['busca'];
           	    $consulta = $miPDO->prepare("SELECT * FROM tb_tareas where materia = '$condicion' or tarea = '$condicion' or id_tarea = '$condicion';");
	            $consulta->execute();
           }else
           {
           	    $consulta = $miPDO->prepare("SELECT * FROM tb_tareas;");
	            $consulta->execute();
           }

	    ?>


	    <?php foreach ($consulta as $clave => $valor): ?> 
	    <tr>
	       <th scope ="row" style ="color:#11B2E6;"><?= $valor['id_tarea']; ?></th>
	       <td><?= $valor['materia']; ?></td>
	       <td><?= $valor['tarea']; ?></td>
	       <td>  <a href ="desscarga_pdf.php?rubrica ='<?=$valor['rubrica'];?>' "><?= $valor['rubrica'];?></a></td>
	       <td><?= $valor['fecha_entrega']; ?></td>
           <?php


              $ent = "No Entregada";
              $color = "red";
              if($valor['b'] == 1)
              { 

              	 $ent = "Entregado";
              	 $color = "green";

              }
              
              $id = $valor['id_tarea'];
	       	?>



	       <td style ="color:<?=$color?>"><?=$ent?></td>


	       <td>

	       	   <?php  echo "<a href='eliminar.php?id=$id' class='btn btn-outline-danger'>Eliminar</a>"; ?>
	       	   <?php  echo "<a href='modificar.php?id=$id' class='btn btn-outline-success'>Modificar</a>"; ?>
	       	   <?php  echo "<a href='entregar.php?id=$id' class='btn btn-outline-primary'>Entregar</a>"; ?>
	       	 
	       </td>
	    </tr>
	    <?php endforeach; ?>
	    </tbody> 

	  </table>
 </div>
    	


 <footer class="container-fluid text-center p-3" style ="color:Gray;">
        <p>Todos los derechos reservados 2022</p>
 </footer>
 </body>



</html>