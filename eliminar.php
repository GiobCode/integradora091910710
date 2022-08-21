<?php
    
     include("conexion.php");

     $id_tarea = $_GET['id'];

     $eliminar = $miPDO->prepare("DELETE FROM tb_tareas where id_tarea = '$id_tarea';");
     $eliminar->execute();
    

     header("Location:lista.php");
?>