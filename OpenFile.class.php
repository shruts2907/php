<?php
	

class OpenFile 
{
    //private $userFilter;
	const FILENAME ="clips.csv";
	//public static $m_pInstance;
	private $csvarray = array();
	private $content_array = array();
	
	///////////////////////////////////////////////////
	//default constructor if file fails to topen it can be 
	//opened thru constructor
	//////////////////////////////////////////////////////
    public function __construct()
    {
        //check if file exists
		try{
			if(file_exists(FILENAME)){
				
				//if file exists extract the content from the file
				self::read_the_file(FILENAME);
				
			}else{
				//throw exception if file not found
				throw new Exception("<p style=\"padding: 1em; width: 55%; color: #1C1C1C; font-size: 14pt;height: 2em;border:1px solid red; background-color: #F5A9BC;border-radius: 5px;fon-family:helvetica,sans-serif;\"><span style=\"font-size:18pt; font-family: Arial, serif; font-style:bold;\">ERORR!</span> Unable to create valid.csv</p>");
			}
		}catch(Exception $e){
		
			//catch the thrown exception here
			echo $e->getMessage();
		}

    }
    
		
	
	///////////////////////////////////////////////////
	//EXTRACT THE CSV FILE INPUT AND CONVERT IT INTO ARRAY
	//called in demo.php 
	//@param: $csvarray
	//@return: $csvarray
	///////////////////////////////////////////////////
	public function read_the_file($file){
		
		try{
			
			//check wether file is readable
			if(file_exists($file)){
				try{
					if (($file = fopen($file, "r")) !== FALSE) {
						
						$col = 0;
						while (($data = fgetcsv($file, 0, ",")) !== FALSE) {
							
							$count = count($data);
							# Populate the multidimensional array.
							for ($row=0;$row<$count;$row++)
							{
								$csvarray[$col][$row] = $data[$row];
							}
							$col++;
						}
						# Close the File.
						fclose($file);
						
						//var_dump($csvarray);
						self::columnizeArray($csvarray);
						return $csvarray;
					}else{
					
						throw new Exception("<p style=\"padding: 1em; width: 55%; color: #1C1C1C; font-size: 14pt;height: 2em;border:1px solid red; background-color: #F5A9BC;border-radius: 5px;fon-family:helvetica,sans-serif;\"><span style=\"font-size:18pt; font-family: Arial, serif; font-style:bold;\">ERORR!</span> Unable to Open clips.csv</p>");
					
					
					}//end of else if fileopen
				}catch(Exception $e){
				
					echo $e->getMessage();
				
				}
			}else{
			
					throw new Exception("<p style=\"padding: 1em; width: 55%; color: #1C1C1C; font-size: 14pt;height: 2em;border:1px solid red; background-color: #F5A9BC;border-radius: 5px;fon-family:helvetica,sans-serif;\"><span style=\"font-size:18pt; font-family: Arial, serif; font-style:bold;\">ERORR!</span>Unable to Open File</p>");
			}
			
		}catch(Exception $e){
			
			//catch the thrown message
			echo $e->getMessage();
		
		}//end of catch
		
	}//end of the read the file functio
	
	
	
	#########################################################
	#function: array created for futute use using id as key
	#@param: $csvarray, $content_array
	#@return: $content_array
	######################################################
	// take the row'ified data and columnize the array
	function columnizeArray($csvarray) {
		
			//var_dump($csvarray);
		foreach($csvarray as $key=>$value) {
			// reparse into useful array data.
			if ($key > 0){
			   
				$content_array[] = array('id'=>$value[0],'title'=>$value[1],'privacy'=>$value[2],'total_play'=>$value[3],'total_comments'=>$value[4],'total_likes'=>$value[5]);
			
				//echo "<pre>";
				//print_r($content_array);
				//echo "</pre>";
			}else{
				//do nothing
			}
			
			
		}//end of for loop
		
		return $content_array;
		
	}// end of coulumanize function
	

}#end of class UseFilterIterator




?>
