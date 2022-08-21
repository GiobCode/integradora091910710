<?php
    
     include("conexion.php");

     $id_tarea = $_GET['id'];

     $entregar = $miPDO->prepare("UPDATE tb_tareas SET b = '1' where id_tarea = '$id_tarea';");
     $entregar->execute();
    

     header("Location:lista.php");
?>