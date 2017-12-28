<?php
 // INCLUDE THE phpToPDF.php FILE
require("../phpToPDF.php"); 
session_start();
// PUT YOUR HTML IN A VARIABLE
$my_html="<html><body><center>";
$my_html.=$_SESSION['my_html'];
$my_html.="</center></body></html>";



// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'save',
  "save_directory" => '',
  "file_name" => 'report.pdf');


// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
header('Location: report.pdf');
?>