<?php
     
     
     $mi_pdf = $_GET['rubrica'];;

     header('Content-type: application/pdf');
     header('Content-Disposition: attachment; filename="'.$mi_pdf.'"');
     
     readfile($mi_pdf);

?>