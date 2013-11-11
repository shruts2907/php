<?php
#################################################################
#class: UseFilterIterator
#use to iterator through array
#return the current value inside array
#################################################################
class UseFilterIterator extends FilterIterator implements Iterator
{
    private $userFilter;
	
	
	
	###########################################################
	#
	#constructor of the class to intialise the Iterator for 
	#traversing throught the array
	#
	###########################################################
    public function __construct(Iterator $iterator  )
    {
        
		parent::__construct($iterator);
        //$this->userFilter = $filter;
    }
    
	
	
	########################################################
	#
	#function: abstract overwrittent to iterate through 
	#file content inside array
	#@param: $user -> contain the current value of the array
	#@return: current iterator value
	#
	########################################################
    public function accept()
    {
		//echo "<p>"."inside accept"."</p>";
		$user = $this->getInnerIterator()->current();
		
        return true;
    }
	
	
	 
}#end of class UserFilter

	
?>
