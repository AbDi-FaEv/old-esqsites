<?php


class rmFileSystem
{
	
	const TYPE_ALL 	= 'all';
	const TYPE_DIR 	= 'dir';
	const TYPE_FILE = 'file';
	
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
	
	protected static $file_class = "rmFile";
	
	protected function __construct()
	{
	}
	
	public static function setFileClass($file_class)
	{
		self::$file_class = $file_class;
	}
	
	public static function getOrderOptions()
	{
		return self::$order_options;
	}
	
	public static function getContent($dir, $type = self::TYPE_ALL, $filetypes = null, $pattern = null )
	{
		$iterator = new DirectoryIterator($dir);
		foreach($iterator as $fileinfo) 
		{
			if(!$fileinfo -> isDot() && self::checkFile($fileinfo, $type, $filetypes, $pattern)) 
			{
				
				$file = self::factory($fileinfo);
				$files[] = $file;
			}
		}
		if(isset($files))
		{
			usort($files, array(__CLASS__, "sortByFiletype"));
			return $files;
		}
		return null;
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
	
	protected static function checkFile($fileinfo, $type, $filetypes, $pattern = null)
	{
		switch($type)
		{
			case self::TYPE_DIR:
				if(!$fileinfo -> isDir()) return false;
			break;
			case self::TYPE_FILE:
				if($fileinfo -> isDir()) return false;
			break;
		}
		
		if($pattern)
		{
			return false;
		}
		
		return true;
	}
	
	public static function sortByFileType($a, $b)
	{
		if($a -> isDir() && !$b -> isDir()) return -1;
		if(!$a -> isDir() && $b -> isDir()) return 1;
		
		return strcasecmp($a -> getFilename(), $b -> getFilename());
	}
	
	public static function getDirectories($dir, $pattern = null)
	{
		return self::getContent($dir, rmFileSystem::TYPE_DIR, $pattern);
	}
	
	public static function orderFilesBySize($files)
	{
		@usort($files, array("rmFileSystem", "orderBySizeCallback"));
		return $files;
	}
	
	public static function orderFilesByName($files)
	{
		@usort($files, array("rmFileSystem", "orderByNameCallback"));
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
		usort($files, array("rmFileSystem", "orderByTypeCallback"));
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
		usort($files, array("rmFileSystem", "orderByLastModCallback"));
		return $files;
	}
	
	public static function orderByLastModCallback($a, $b)
	{
		// JE - Reversed these to bring newest first.
		if($a -> getLastModDate() > $b -> getLastModDate()) return -1;
		if($a -> getLastModDate() < $b -> getLastModDate()) return 1;
		else return 0;
	}
	
	public static function getFiles( $dir, $types = null, $exclude_types = array() )
	{
		return self::getContent($dir, self::TYPE_FILE, $types);
	}
	
	public static function find()
	{
		return sfFinder::type('all');
	}
	
	public static function findFiles()
	{
		return sfFinder::type('file');
	}
	
	public static function findDirectories()
	{
		return sfFinder::type('dir');
	}
	
	public static function getRecursive( $dir )
	{
		$it = new RecursiveDirectoryIterator( $dir );
		foreach(new RecursiveIteratorIterator($it) as $file ) 
		{
			$files[] = self::factory($file);
		}
		return isset($files) ? $files : null;
	}
	
	public static function getParentDirectory( $dir )
	{
		$bits = explode(DIRECTORY_SEPARATOR, $dir);
  		array_pop( $bits );
  		return implode(DIRECTORY_SEPARATOR, $bits);
	}
	
	public static function factory($file, $file_class = null)
	{
		if($file_class === null) 
		{
			$file_class = self::$file_class;
		}
		
		return new $file_class($file);
	}
	
}