<?php
/**
 * A content filter that physically resizes all contained images to the size indicated in their attributes
 *
 * @author Richtermeister
 */
class sfContentFilterImageResize extends sfContentFilterAbstract
{
  public function _doFilter($content)
  {
    $images = $this -> getImages($content);
    return $this -> processImages($images, $content);
  }

  protected function getImages($text)
  {
    $images = array();

    // Find all image tags, ensuring that they have a src.
    $matches = array();
    preg_match_all('/((<a [^>]*>)[ ]*)?(<img[^>]*?src[ ]*=[ ]*"([^"]+)"[^>]*>)/i', $text, $matches);

    // Loop through matches and find if replacements are necessary.
    // $matches[0]: All complete image tags and preceeding anchors.
    // $matches[1]: The anchor tag of each match (if any).
    // $matches[2]: The anchor tag and trailing whitespace of each match (if any).
    // $matches[3]: The complete img tag.
    // $matches[4]: The src value of each match.
    foreach ($matches[0] as $key => $match) {
      $has_link = (bool) $matches[1][$key];
      $img_tag = $matches[3][$key];
      $src = $matches[4][$key];

      $resize = NULL;
      $width = NULL;
      $height = NULL;
      $needs_width = TRUE;
      $needs_height = TRUE;

      // Because we don't know the order of the attributes and images might not
      // have both attributes, match individually for height and width.
      foreach (array('width', 'height') as $property) {
        $property_matches = array();
        preg_match_all('/[ \'";]' . $property . '[ ]*([=:])[ ]*"?([0-9]+)(%?)"?/i', $img_tag, $property_matches);

        // If this image uses percentage width or height, do not process it.
        if (in_array('%', $property_matches[3])) {
          $resize = FALSE;
          $needs_width = FALSE;
          $needs_height = FALSE;
          break;
        }

        // In the odd scenario there is both a style="width: xx" and a width="xx"
        // tag, base our calculations off the style tag, since that's what the
        // browser will display.
        $property_key = 0;
        $property_count = count($property_matches[1]);
        $needs_property = TRUE;
        if ($property_count) {
          $property_key = array_search(':', $property_matches[1]);
          $needs_property = FALSE;
        }
        // Only a style property found, we'll need to add a real height/width tag
        // to the HTML later. This specifically prevents problems with FCKeditor
        // that only adds style tags when resizing images.
        if ($property_count == 1 && strcmp($property_matches[1][$property_key], ':') == 0){
          $needs_property = TRUE;
        }
        ${$property} = !empty($property_matches[2][$property_key]) ? $property_matches[2][$property_key] : FALSE;
        ${'needs_' . $property} = $needs_property;
      }

      // Find the image title if any.
      $title = NULL;
      $title_matches = array();
      preg_match('/title[ ]*=[ ]*"([^"]+)"/i', $img_tag, $title_matches);
      if (isset($title_matches[1])) {
        $title = $title_matches[1];
      }

      // Determine if this is a local or remote file.
      $location = 'unknown';
      if (strpos($src, '/') === 0 || strpos($src, '.') === 0) {
        $location = 'local';
      }
      elseif (preg_match('/http[s]?:\/\/' . preg_quote($_SERVER['HTTP_HOST'], '/') . '/', $src)) {
        $location = 'local';
      }
      elseif (strpos($src, 'http') === 0) {
        $location = 'remote';
      }

      // Convert the URL to a local path.
      $local_path = NULL;
      if ($location == 'local') {
        if (strpos($src, '.') !== 0) {
          // Remove the http:// and base path.
          $local_path = preg_replace('/(http[s]?:\/\/' . preg_quote($_SERVER['HTTP_HOST'], '/') . ')?' . preg_quote(sfConfig::get("sf_web_dir"), '/') . '/', '', $src, 1);

          // Build a list of acceptable language prefixes. //not neccessary
          $lang_codes = '';

          // Convert to a file system path if using private files.
          if (preg_match('!^(\?q\=)?' . $lang_codes . 'system/files/!', $local_path)) {
            $local_path = file_directory_path('private') . '/' . preg_replace('!^(\?q\=)?' . $lang_codes . 'system/files/!', '', $local_path);
          }
        }
        $local_path = rawurldecode($local_path);
      }

      // If this is a remote image, retreive it to check its size.
      if ($location == 'remote') {
        continue; //disabled
//        $result = drupal_http_request($src);
//        if ($result->code == 200) {
//          $tmp_file = tempnam(file_directory_path('temp'), 'image_resize_filter_');
//          $handle = fopen($tmp_file, 'w');
//          fwrite($handle, $result->data);
//          fclose($handle);
//          $local_path = $tmp_file;
//        }
      }
      
      // Get the image size.
      $full_path = sfConfig::get("sf_web_dir").$local_path;
      if (is_file($full_path) && file_exists($full_path))
      {
        $image_size = @getimagesize($full_path);
      }
      else
      {
        continue;
      }

      // All this work and the image isn't even there. Bummer. Next image please.
      if (empty($image_size)) {
        continue;
      }

      $actual_width = $image_size[0];
      $actual_height = $image_size[1];

      // If either height or width is missing, calculate the other.
      if (!$width && !$height) {
        $width = $actual_width;
        $height = $actual_height;
      }
      if (!$height) {
        $ratio = $actual_height/$actual_width;
        $height = round($ratio * $width);
      }
      elseif (!$width) {
        $ratio = $actual_width/$actual_height;
        $width = round($ratio * $height);
      }

      // Determine if this image requires a resize.
      if (!isset($resize)) {
        $resize = ($actual_width != $width || $actual_height != $height);
      }

      // Skip processing if these conditions are met:
      // - The image already has both height and width attributes.
      // - The image is local and is already the right size.
      // - The image is remote and a 1x1 pixel tracking image.
      if ((!$needs_width && !$needs_height) &&
          (($location == 'local' && !$resize) ||
           ($location == 'remote' && $actual_width == 1 && $actual_height == 1))) {
        continue;
      }

      // Check the image extension by name.
      $extension_matches = array();
      preg_match('/\.([a-zA-Z0-9]+)$/', $src, $extension_matches);
      if (!empty($extension_matches)) {
        $extension = strtolower($extension_matches[1]);
      }
      // If the name extension failed (such as an image generated by a script),
      // See if we can determine an extension by MIME type.
      elseif (isset($image_size['mime'])) {
        switch ($image_size['mime']) {
          case 'image/png':
            $extension = 'png';
            break;
          case 'image/gif':
            $extension = 'gif';
            break;
          case 'image/jpeg':
          case 'image/pjpeg':
            $extension = 'jpg';
            break;
        }
      }

      // If we're not certain we can resize this image, skip it.
      if (!isset($extension) || !in_array(strtolower($extension), array('png', 'jpg', 'jpeg', 'gif'))) {
        continue;
      }

      // If getting this far, the image exists and is not the right size or needs
      // to be saved locally from a remote server.
      // Add all information to a list of images that need resizing.
      $images[] = array(
        'expected_size' => array('width' => $width, 'height' => $height),
        'actual_size' => array('width' => $image_size[0], 'height' => $image_size[1]),
        'add_properties' => array('width' => $needs_width, 'height' => $needs_height),
        'resize' => $resize,
        'img_tag' => $img_tag,
        'title' => $title,
        'has_link' => $has_link,
        'original' => $src,
        'location' => $location,
        'local_path' => $local_path,
        'mime' => $image_size['mime'],
        'extension' => $extension,
      );
    }

    return $images;
  }

  public function processImages($images, $text)
  {
    foreach($images as $image)
    {
      $image["destination"] = thumbnail_path($image["local_path"], $image["expected_size"]["width"], $image["expected_size"]["height"]);
      $this -> current_image = $image;
      $text = preg_replace_callback('/(<img[^>]*?src[ ]*=[ ]*")' . preg_quote($image['original'] ,'/') . '("[^>]*?)(\/?>)/i', array($this, 'updateImageTag'), $text);
    }
    return $text;
  }

  protected $current_image;

  public function updateImageTag($matches = NULL)
  {
    $image = $this -> current_image;

    if (!isset($matches)) {
      return;
    }

    // Do not do replacements if the image tag doesn't match exactly. This can
    // happen if the same image is in the same post multiple times.
    if ($matches[0] != $image['img_tag']) {
      return $matches[0];
    }

    $src = $image['destination'];

    // Strip the http:// from the path if the original did not include it.
    if (!preg_match('/^http[s]?:\/\/' . preg_quote($_SERVER['HTTP_HOST']) . '/', $image['original'])) {
      $src = preg_replace('/^http[s]?:\/\/' . preg_quote($_SERVER['HTTP_HOST']) . '/', '', $src);
    }

    $output = '';
    $output .= $matches[1]; // The start of the tag.
    $output .= $src; // The new src.
    $output .= $matches[2]; // The end of the tag, excluding the closing "/>".

    // Add height and width properties if they are missing from the original tag.
    $output .= $image['add_properties']['width'] ? ' width="' . $image['expected_size']['width'] . '"' : '';
    $output .= $image['add_properties']['height'] ? ' height="' . $image['expected_size']['height'] . '"' : '';

    $output .= $matches[3]; // The closing "/>".

    return $output;
  }

  public function processImages2()
  {
    $local_file_path = '';
    foreach ($images as $image) {
      // Copy remote images locally.
      if ($image['location'] == 'remote') {;
        $local_file_path = 'resize/remote/' . md5(file_get_contents($image['local_path'])) . '-' . $image['expected_size']['width'] . 'x' . $image['expected_size']['height'] . '.'. $image['extension'];
        $image['destination'] = variable_get('file_default_scheme', 'public') . '://' . $local_file_path;
      }
      // Destination and local path are the same if we're just adding attributes.
      elseif (!$image['resize']) {
        $image['destination'] = $image['local_path'];
      }
      else {
        $path_info = image_resize_filter_pathinfo($image['local_path']);
        $local_file_dir = file_uri_target($path_info['dirname']);
        $local_file_path = 'resize/' . ($local_file_dir ? $local_file_dir . '/' : '') . $path_info['filename'] . '-' . $image['expected_size']['width'] . 'x' . $image['expected_size']['height'] . '.' . $path_info['extension'];
        $image['destination'] = $path_info['scheme'] . '://' . $local_file_path;
      }

      if (!file_exists($image['destination'])) {
        // Create the resize directory.
        $directory = dirname($image['destination']);
        file_prepare_directory($directory, FILE_CREATE_DIRECTORY);

        // Move remote images into place if they are already the right size.
        if ($image['location'] == 'remote' && !$image['resize']) {
          $handle = fopen($image['destination'], 'w');
          fwrite($handle, file_get_contents($image['local_path']));
          fclose($handle);
        }
        // Resize the local image if the sizes don't match.
        elseif ($image['resize']) {
          $res = image_load($image['local_path']);
          image_resize($res, $image['expected_size']['width'], $image['expected_size']['height']);
          image_save($res, $image['destination']);
        }
        @chmod($image['destination'], 0664);
      }

      // Delete our temporary file if this is a remote image.
      image_resize_filter_delete_temp_file($image['location'], $image['local_path']);

      // Replace the existing image source with the resized image.
      // Set the image we're currently updating in the callback function.
      image_resize_filter_update_tag(NULL, $image, $settings);
      $text = preg_replace_callback('/(<img[^>]*?src[ ]*=[ ]*")' . preg_quote($image['original'] ,'/') . '("[^>]*?)(\/?>)/i', 'image_resize_filter_update_tag', $text);
    }
    return $text;
  }
}