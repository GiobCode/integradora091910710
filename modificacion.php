<?php 
    
    include("conexion.php");

    $id = $_GET['id'];
    $materia = $_GET['materia'];
    $tarea = $_GET['tarea'];
    $fecha = $_GET['fecha'];
 
     $rubrica = $_GET['rubrica'];
    


     if(strlen($rubrica) > 0)
     {
	         $modificar = $miPDO->prepare("UPDATE tb_tareas SET materia = '$materia',tarea ='$tarea',rubrica = '$rubrica' ,fecha_entrega = '$fecha' where id_tarea = '$id';");
	         $modificar->execute();
     }else
	 {
	     	 $modificar = $miPDO->prepare("UPDATE tb_tareas SET materia = '$materia',tarea ='$tarea' ,fecha_entrega = '$fecha' where id_tarea = '$id';");
	         $modificar->execute();
	 }

     header("Location:lista.php");


?>