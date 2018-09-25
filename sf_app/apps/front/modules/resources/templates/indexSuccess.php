<h1>Resources</h1>

<p>Below you will find useful links to legal related businesses who are associated with EsqSites123.com</p>

<ul id="resource_categories">
  <?php foreach($categories as $category): ?>
    <li><?php echo link_to($category." (".$category -> countResources().")", "resource_category", $category); ?></li>
  <?php endforeach; ?>
</ul>