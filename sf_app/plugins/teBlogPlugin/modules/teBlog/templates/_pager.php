<?php
$routes = $sf_context -> getRouting() -> getRoutes();
$current_route = $routes[$sf_context -> getRouting() -> getCurrentRouteName()];
?>

<ul id="te_blog_pager">
<?php if($pager instanceof PropelModelPager && $pager -> haveToPaginate()): ?>
  <?php if($pager->getPage() != 1): ?>
    <?php $url = $sf_context -> getRouting() -> generate($sf_context -> getRouting() -> getCurrentRouteName(), array_merge($current_route -> getParameters(), array("page" => $pager->getPreviousPage()))); ?>
    <li><?php echo link_to(__('&laquo; Previous'), $url); ?></li>
  <?php endif; ?>

  <?php for($i = 1;$i <= $pager -> getLastPage();$i++): ?>
    <?php $url = $sf_context -> getRouting() -> generate($sf_context -> getRouting() -> getCurrentRouteName(), array_merge($current_route -> getParameters(), array("page" => $i))); ?>
    <li><a href="<?php echo $url; ?>" <?php if($i == $pager -> getPage()) echo 'class="current"'; ?>><?php echo $i; ?></a></li>
  <?php endfor; ?>

  <?php if($pager->getPage() != $pager->getLastPage()): ?>
    <?php $url = $sf_context -> getRouting() -> generate($sf_context -> getRouting() -> getCurrentRouteName(), array_merge($current_route -> getParameters(), array("page" => $pager->getNextPage()))); ?>
    <li><?php echo link_to(__('Next &raquo;'), $url); ?></li>
  <?php endif; ?>
<?php endif; ?>
</ul>




