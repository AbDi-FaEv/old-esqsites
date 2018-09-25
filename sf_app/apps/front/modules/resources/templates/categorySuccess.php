<h1><?php echo $category; ?></h1>

<?php echo link_to("Back to Resources", "resources"); ?>

<table>
<?php foreach($category -> getResources() as $resource): ?>
  <tr>
  <h2><a href="<?php echo $resource -> getUrl(); ?>"><?php echo $resource -> getCompanyName(); ?></a></h2>
    <p><?php echo $resource -> getDescription(); ?></p>
    <?php echo mail_to($resource -> getEmail()); ?>
  </tr>
<?php endforeach; ?>
</table>