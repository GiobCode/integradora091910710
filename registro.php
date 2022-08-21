<?php

            include("conexion.php");
            
            $materia = $_GET['materia'];
            $tarea = $_GET['tarea'];
            $rubrica = $_GET['rubrica'];
            $fecha = $_GET['fecha'];
            
            $registro = $miPDO->prepare("INSERT INTO tb_tareas(`id_tarea`,`materia`,`tarea`,`fecha_entrega`,`rubrica`,`b`) values(id_tarea,'$materia','$tarea','$fecha','$rubrica',0);");
            $registro->execute();
            header("Location:lista.php");

?>