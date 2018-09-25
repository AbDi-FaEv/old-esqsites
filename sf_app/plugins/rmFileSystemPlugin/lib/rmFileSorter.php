<?php

class rmFileSorter
{
	
	const ORDER_BY_NAME 	= 'name';
	const ORDER_BY_SIZE 	= 'size';
	const ORDER_BY_LAST_MOD = 'last_mod';
	const ORDER_BY_TYPE 	= 'type';
	
	const ORDER_ASC 	= 'asc';
	const ORDER_DESC 	= 'desc';
	
	protected static $order_options = array(
		self::ORDER_BY_NAME => "Name",
		self::ORDER_BY_SIZE => "Size", 
		self::ORDER_BY_TYPE => "Type",
		self::ORDER_BY_LAST_MOD => "Last Modified" 
	);
	
	protected static $order_functions = array(
		self::ORDER_BY_NAME => "orderFilesByName",
		self::ORDER_BY_SIZE => "orderFilesBySize", 
		self::ORDER_BY_LAST_MOD => "orderFilesByLastModDate", 
		self::ORDER_BY_TYPE => "orderFilesByType"
	);
	
	protected function __construct()
	{
		
	}
	
	public static function getOrderOptions()
	{
		return self::$order_options;
	}
	
	public static function orderFiles($files, $type = null, $direction = null)
	{
		if($type === null)
		{
			$type = self::ORDER_BY_NAME;
		}
		if($direction === null)
		{
			$direction = self::ORDER_ASC;
		}
		if(is_array($files))
		{
			if(isset(self::$order_functions[$type]))
			{
				$order_function = self::$order_functions[$type];
				$files = call_user_func_array(array(__CLASS__, $order_function), array($files));
			}
			if($direction == self::ORDER_DESC)
			{
				$files = array_reverse($files);
			}
		}
		return $files;
	}
	
	public static function sortByFileType($a, $b)
	{
		if($a -> isDir() && !$b -> isDir()) return -1;
		if(!$a -> isDir() && $b -> isDir()) return 1;
		
		return strcasecmp($a -> getFilename(), $b -> getFilename());
	}
	
	public static function orderFilesBySize($files)
	{
		@usort($files, array(__CLASS__, "orderBySizeCallback"));
		return $files;
	}
	
	public static function orderFilesByName($files)
	{
		@usort($files, array(__CLASS__, "orderByNameCallback"));
		return $files;
	}
	
	public static function orderByNameCallback($a, $b)
	{
		return strcmp($a -> getFilename(), $b -> getFilename());
	}
	
	public static function orderBySizeCallback($a, $b)
	{
		if($a -> getSize() > $b -> getSize()) return 1;
		if($a -> getSize() < $b -> getSize()) return -1;
		else return 0;
	}
	
	public static function orderFilesByType($files)
	{
		usort($files, array(__CLASS__, "orderByTypeCallback"));
		return $files;
	}
	
	public static function orderByTypeCallback($a, $b)
	{
		$a_ext = $a -> getExtension();
		$b_ext = $b -> getExtension();
		return strcmp($a_ext, $b_ext);
	}
	
	public static function orderFilesByLastModDate($files)
	{
		usort($files, array(__CLASS__, "orderByLastModCallback"));
		return $files;
	}
	
	public static function orderByLastModCallback($a, $b)
	{
		// JE - Reversed these to bring newest first.
		if($a -> getLastModDate() > $b -> getLastModDate()) return -1;
		if($a -> getLastModDate() < $b -> getLastModDate()) return 1;
		else return 0;
	}
}