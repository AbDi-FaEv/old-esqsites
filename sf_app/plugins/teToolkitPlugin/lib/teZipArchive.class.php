<?php
/**
 * custom extension of built-in ZipArchive to privide addDirectory method
 *
 * @author Richtermeister
 */
class teZipArchive extends ZipArchive
{
  /**
   * recursively adds an entire directory to this archive
   * @param string $directory path to the directory to add
   */
  public function addDirectory($directory)
  {
    $directory = realpath($directory); //ensure we don't work with relative path
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory), RecursiveIteratorIterator::SELF_FIRST);

    foreach ($files as $file)
    {
      $file = realpath($file);

      if (is_dir($file))
      {
        $this -> addEmptyDir(str_replace($directory . '/', '', $file . '/'));
      }
      else if (is_file($file))
      {
        $this -> addFile($file, str_replace($directory . '/', '', $file));
      }
    }

    return $this; //fluent interface
  }
}