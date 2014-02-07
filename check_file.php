<?php
$message = null;
$allowed_extensions = array('xlsx');
$upload_path = '';
if (!empty($_FILES['file'])) {
        if ($_FILES['file']['error'] == 0) {                        
                // check extension
                $file = explode(".", $_FILES['file']['name']);
                $extension = array_pop($file);  
                if (in_array($extension, $allowed_extensions)) {        
                        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_path.'./'.$_FILES['file']['name'])) {                
                                if (($handle = fopen($upload_path.'./'.$_FILES['file']['name'], "r")) !== false) {
                                        $keys = array();
                                        $out = array();                                        
                                        $insert = array();                                        
                                        $line = 1;                                        
                                        while (($row = fgetcsv($handle, 0, ',', '"')) !== FALSE) {                                        
                                        foreach($row as $key => $value) {
                                                if ($line === 1) {
                                                        $keys[$key] = $value;
                                                } else {
                                                        $out[$line][$key] = $value;                                                        
                                                }
                                        }                                        
                                        $line++;                                      
                                    }                                    
                                    fclose($handle);   
                                    if (!empty($keys) && !empty($out)) 
									{
												fn_store();
                                                $message = '<span class="green">File has been uploaded successfully</span>';
												echo $message;
                                    } 
                                }
                        }
                        
                } else {
                        $message = '<span class="red">Only .xlsx file format is allowed</span>';
						echo $message;
                }
                
        } else {
                $message = '<span class="red">There was a problem with your file</span>';
				echo $message;
        }
}

function fn_store()
{
require_once 'PHPExcel/Classes/PHPExcel.php';
$fname= $_FILES['file']['name'];

$objTpl = PHPExcel_IOFactory::load($fname);
$objTpl->setActiveSheetIndex(0);  //set first sheet as active
 


$XLFileType = PHPExcel_IOFactory::identify($fname); 
$objReader = PHPExcel_IOFactory::createReader($XLFileType); 
//$objReader->setLoadSheetsOnly('Kai'); 
$objPHPExcel = $objReader->load($fname); 
//$objWorksheet = $objPHPExcel->setActiveSheetIndexByName('Kai'); 
$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);

$f1=$objPHPExcel->getActiveSheet()->getCell('B2')->getFormattedValue();
$f2=$objPHPExcel->getActiveSheet()->getCell('B3')->getFormattedValue();
$f3=$objPHPExcel->getActiveSheet()->getCell('B4')->getFormattedValue();
$f4=$objPHPExcel->getActiveSheet()->getCell('B5')->getFormattedValue();
$f5=$objPHPExcel->getActiveSheet()->getCell('B6')->getFormattedValue();
$f6=$objPHPExcel->getActiveSheet()->getCell('B7')->getFormattedValue();
$f7=$objPHPExcel->getActiveSheet()->getCell('B8')->getFormattedValue();
$f8=$objPHPExcel->getActiveSheet()->getCell('B9')->getFormattedValue();
$f9=$objPHPExcel->getActiveSheet()->getCell('B10')->getFormattedValue();
$f10=$objPHPExcel->getActiveSheet()->getCell('B11')->getFormattedValue();


// Connect to server and select databse.
$con = mysql_connect("localhost","root","mysql");



mysql_select_db("sample_data_db", $con);

// Insert data into table
$sql="INSERT INTO sample_data_tb_incident VALUES ('$f1', '$f2', '$f3', '$f4', '$f5', '$f6', '$f7', '$f8', '$f9', '$f10')";
mysql_query( $sql, $con ) or trigger_error( mysql_error( $con ), E_USER_ERROR );
mysql_close($con);
}
?>