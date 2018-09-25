<?php

class rmFileFinder extends sfFinder 
{
	
	protected $file_class = "rmFile";
	protected $order_criterion;
	protected $order_direction;
	protected $case_sensitive = true;
	protected $match_dirs = false;
	
    public function __construct()
    {
    	
    }
    
	public function setFileClass($file_class)
	{
		$this -> file_class = $file_class;
		return $this;
	}
    
    public function in()
    {
    	$arg_list = func_get_args();
    	if($files = parent::in($arg_list))
    	{
    		$files = self::hydrateFiles($files, $this -> file_class);
	    	$files = rmFileSorter::orderFiles($files, $this -> order_criterion, $this -> order_direction);
    	}
    	return $files;
    }
    
    public function orderBy($criterion, $direction = rmFileSorter::ORDER_ASC)
    {
    	$this -> order_criterion = $criterion;
    	$this -> order_direction = $direction;
    	
    	return $this;
    }
    
    public static function hydrateFiles($paths, $file_class = null)
    {
    	if($file_class === null)
		{
			$file_class = self::$file_class;
		}
		foreach($paths as $path)
		{
			$files[] = new $file_class($path);
		}
		return $files;
    }
    
    public static function type($name)
  	{
	    $class_name = __CLASS__;
	    $finder = new $class_name();
	
	    if (strtolower(substr($name, 0, 3)) == 'dir')
	    {
	      $finder->type = 'directory';
	    }
	    else if (strtolower($name) == 'any')
	    {
	      $finder->type = 'any';
	    }
	    else
	    {
	      $finder->type = 'file';
	    }

	    return $finder;
  	}
  	
  	public function caseSensitive($bool)
  	{
  		$this -> case_sensitive = $bool;
  		return $this;
  	}
  	
  	protected function match_names($dir, $entry)
  	{
  		if(!$this -> case_sensitive)
  		{
  			//$dir = strtolower($dir);	
  			$entry = strtolower($entry);
  		}
  		return parent::match_names($dir, $entry);
  	}
  	
}
?>