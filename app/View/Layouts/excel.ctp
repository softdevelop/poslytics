<?php

  header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
  header ("Cache-Control: no-cache, must-revalidate");
  header ("Pragma: no-cache");
  header ("Content-type: application/vnd.ms-excel");/*.pdf,.xls*/
  header ("Content-Disposition: attachment; filename=Report.xls" );
  header ("Content-Description: Generated Report" );
 ?>
 <?php echo $content_for_layout ?> 