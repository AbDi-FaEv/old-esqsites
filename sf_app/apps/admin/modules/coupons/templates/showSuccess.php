<div id="sf_admin_container">
<div id="sf_admin_content">

<h1>Coupon: <?php echo $coupon -> getCode(); ?></h1>

<?php foreach($coupon -> getCouponToWebsiteLinksJoinWebsite() as $website_link) { ?>
<?php $website = $website_link -> getWebsite(); ?>  
<?php echo link_to($website, "website_show", $website); ?>
  
<?php } ?>

</div>
</div>