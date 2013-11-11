<?php

	/**************************************************
	 *magic function called when the page is loaded
	 *calls the file containing class
	***************************************************/
	function __autoload($className)
	{
		require_once $className.'.class.php';
		//echo $className;
	}
	
	//constant for file to extract info
	define("FILENAME","clips.csv");
	$valid = array();
	$invalid = array();	
	
	
	/*****************************************************
	 * populating the array with file content obtained
	 * from OpenFile.class.php function read_the_file
	 * parameter passed is the filename a contant
	******************************************************/
	$array =    OpenFile::read_the_file(FILENAME);
		//echo "<pre> 70-8-0 ";
			//print_r($array);
			//echo "</pre>";
		
		
	//array object to be passed as iterator
	$object = new ArrayObject($array);
		
		//echo "<pre>";
		//print_r($object);
		//echo "</pre>";
		
		$iterator = new UseFilterIterator($object->getIterator());
		foreach ($iterator as $result) {
			if($result[2] == "anybody" ){
				if($result[5] > 10 && $result[3] > 200 && strlen($result[1]) <30){
			
						//echo "<p> +++++++++++ </p>";
						array_push($valid,$result);
						
				}else{
						array_push($invalid,$result);
				}
				
			}else{
					//echo "<p> --------------</p>";
					array_push ($invalid,$result);
			}
		}//end of for each iterator
	
	
	
	
	// Note it is case insensitive check in our example due the usage of strcasecmp function
	
	
	
	// echo "<pre> ++++ ";
		// print_r($valid);
		// echo "</pre>";


	function createValidFile($arr){
		//header('Content-Type: application/excel');
		//header('Content-Disposition: attachment; filename="valid.csv"');
		//$fp = fopen('php://output', 'w');
		$fp = fopen('valid.csv', 'w');
		
		if($fp){
			foreach($arr as $v){
				fputcsv($fp, $v);
			}
			
			fclose($fp);

		 }else{
		
			echo "<p style=\"padding: 1em; width: 55%; color: #1C1C1C; font-size: 14pt;height: 2em;border:1px solid red; background-color: #F5A9BC;border-radius: 5px;fon-family:helvetica,sans-serif;\"><span style=\"font-size:18pt; font-family: Arial, serif; font-style:bold;\">ERORR!</span> Unable to open valid.csv</p>";
		 
		}
		//echo "<pre> 11111 ";
		//print_r($arr);
		//echo "</pre>";
		
		
		if(file_exists('valid.csv')){
			echo "<p style=\"padding: 1em; width: 55%; color: #1C1C1C; font-size: 14pt;height: 2em;border:1px solid green; background-color: #ACFA58;border-radius: 5px;fon-family:helvetica,sans-serif;\"><span style=\"font-size:18pt; font-family: Arial, serif; font-style:bold;\">SUCCESS!</span> valid .csv File Created Successfully on the Server</p>";
		}else{
		
			echo "<p style=\"padding: 1em; width: 55%; color: #1C1C1C; font-size: 14pt;height: 2em;border:1px solid red; background-color: #F5A9BC;border-radius: 5px;fon-family:helvetica,sans-serif;\"><span style=\"font-size:18pt; font-family: Arial, serif; font-style:bold;\">ERORR!</span> Unable to create valid.csv</p>";
		}
		
	
	}
	
	function createInValidFile($arr2){
		//header('Content-Type: application/excel');
		//header('filename="invalid.csv"');
		//$fp = fopen('php://output', 'w');
		 $fp = fopen('invalid.csv', 'w');
			if($fp){
			
				foreach($arr2 as $in){
					fputcsv($fp, $in);
				//echo "<pre> ****** ";
				//print_r($in);
				//echo "</pre>";

			}
				fclose($fp);
				
			}else{
			
				echo "<p style=\"padding: 1em; width: 55%; color: #1C1C1C; font-size: 14pt;height: 2em;border:1px solid red; background-color: #F5A9BC;border-radius: 5px;fon-family:helvetica,sans-serif;\"><span style=\"font-size:18pt; font-family: Arial, serif; font-style:bold;\">ERORR!</span> Unable to open invalid.csv</p>";
			
			}
		
		if(file_exists('invalid.csv')){
			echo "<p style=\"padding: 1em; width: 55%; color: #1C1C1C; font-size: 14pt;height: 2em;border:1px solid green; background-color: #ACFA58;border-radius: 5px;fon-family:helvetica,sans-serif;\"><span style=\"font-size:18pt; font-family: Arial, serif; font-style:bold;\">SUCCESS!</span> invalid .csv File Created Successfully on the Server</p>";
		}else{
		
			echo "<p style=\"padding: 1em; width: 55%; color: #1C1C1C; font-size: 14pt;height: 2em;border:1px solid red; background-color: #F5A9BC;border-radius: 5px;fon-family:helvetica,sans-serif;\"><span style=\"font-size:18pt; font-family: Arial, serif; font-style:bold;\">ERORR!</span> Unable to create invalid.csv</p>";
		}
	}
	echo createValidFile($valid);
	echo createInValidFile($invalid);
	

?>
