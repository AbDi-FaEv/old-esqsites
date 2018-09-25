<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
    <div class="container">
  	<div id="header" class="span-24 last">
      <?php echo link_to(image_tag("logo.jpg", "id=logo"), "@homepage", array("target" => "_top")); ?>
      <?php include_partial("global/topMenu"); ?>
  	</div>
    <?php if($sf_params -> get("in_checkout")): ?>
      <?php include_component("checkout", "steps"); ?>
    <?php endif; ?>
    <div id="main" class="span-24 last">
      <?php echo $sf_content ?>
    </div>
   	</div>
  </body>
</html>