<?php if($website = $domain -> getWebsite()): ?>
<?php echo link_to($website, "website_show", $website); ?>
<?php endif; ?>