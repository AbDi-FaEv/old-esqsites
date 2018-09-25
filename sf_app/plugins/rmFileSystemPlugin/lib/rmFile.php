<?php

class rmFile
{
	
	protected $path;
	protected $pathname;
	protected $filename;
	protected $is_dir;
	
	protected $children;
	
	public function __construct( $file = null )
	{
		if( $file instanceof DirectoryIterator ) 
		{
			$this -> fromIterator( $file );
		} 
		else if( $file instanceof SplFileInfo ) 
		{
			$this -> fromSplFileInfo( $file );
		} 
		else if(file_exists($file)) 
		{
			$this -> fromPath($file);
		}
	}
	
	public function fromIterator( DirectoryIterator $file )
	{
		$this -> filename 	= $file -> getFilename();
		$this -> path 		= $file -> getPath();
		$this -> pathname 	= realpath($file -> getPathname());
		$this -> is_dir 	= $file -> isDir();
	}
	
	public function fromSplFileInfo( SplFileInfo $file )
	{
		$this -> filename 	= $file -> getFilename();
		$this -> path 		= $file -> getPath();
		$this -> pathname 	= realpath($file -> getPathname());
		$this -> is_dir 	= $file -> isDir();
	}
	
	public function fromPath($path)
	{
		$this -> filename	= basename($path);
		$this -> path		= dirname($path);
		$this -> pathname	= realpath($path);
		$this -> is_dir		= is_dir($path);
	}
	
	public function getFilename()
	{
		return $this -> filename;
	}
	
	public function getPath()
	{
		return $this -> path;
	}
	
	public function getPathname()
	{
		return $this -> pathname;
	}
	
	public function getSize($format = false)
	{
		$size = filesize($this -> getPathname());
		return $format ? self::formatFileSize($size) : $size; 
	}
	
	public static function formatFileSize($data)
	{
		// bytes
        if( $data < 1024 ) {
        
            return $data . " bytes";
        
        }
        // kilobytes
        else if( $data < 1048576 ) {
        
            return round( ( $data / 1024 ), 1 ) . "k";
        
        }
        // megabytes
        else {
        
            return round( ( $data / 1048576 ), 1 ) . " MB";
        
        }
    
	}
	
	public function getLastModDate($dateformat = "D M d, Y h:m:s")
	{
		return date(DATE_ATOM, filemtime($this -> getPathname()));
	}
	
	public static function extractExtension( $file, $lowercase = true )
	{
		$bits = explode(".", $file);
		$extension = array_pop( $bits );
		
		return $lowercase ? strtolower($extension) : $extension;
	}
	
	public static function removeExtension( $file )
	{
		return substr($file, 0, strrpos($file, "."));
	}
	
	public function getExtension($lowercase = true)
	{
		return self::extractExtension($this -> filename, $lowercase);
	}
	
	public function isDir()
	{
		return $this -> is_dir;
	}
	
	public function __toString()
	{
		return $this -> filename;
	}
	
	public function getContent($type = rmFileSystem::TYPE_ALL, $filetypes = null, $pattern = null)
	{
		if(!$this -> children)
		{
			$this -> children = rmFileSystem::getContent($this -> pathname, $type, $filetypes, $pattern);
		}
		return $this -> children;
	}
	
	public function getDirs($filetypes = null, $pattern = null)
	{
		if(!$this -> children)
		{
			$this -> children = rmFileSystem::getContent($this -> pathname, rmFileSystem::TYPE_DIR, $filetypes, $pattern);
		}
		return $this -> children;
	}
	
	public function hasChildDir($dirs)
	{
		if(!is_array($dirs))
		{
			$dirs = array($dirs);
		}
		foreach($dirs as $dir)
		{
			if($dir != $this -> getPathname() && eregi($this -> getPathname(), $dir)) return true;
		}
		return false;
	}
	
}