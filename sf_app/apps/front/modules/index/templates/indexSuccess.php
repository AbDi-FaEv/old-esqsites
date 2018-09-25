<div class="span-17 colborder">
  <div id="banner">
    <div id="banner_content">
    <p>Are you looking to build a great web site but don't want to incur the high costs and technical hassle? You've come to the right place!</p>
    <ul>
      <li>No technical knowledge required.</li>
      <li>Preview your site before you purchase.</li>
      <li>No long term contracts.</li>
    </ul>
    <?php echo link_to(image_tag("home_cta_button", array("id" => "cta", "alt_title" => "Start Creating Your Website Now")), "@gallery"); ?>
    </div>
  </div>

  <div class="span-8 append-1">
    <!--
    <h3>Content Management &ndash; Simplified!</h3>
    <p>Update your web site at any time, using ESQSites' userfriendly <a href="">Quick Edit</a>&trade; system.
      Log into your personal dashboard from anywhere in the world, add / remove pages, upload images, and much more...</p>
    <p><?php echo link_to("Click here to learn more about our services.", "@services", array("class" => "tick")); ?></p>
    -->
    <h3>Pricing Plans To Fit Any Budget!</h3>
    <div class="plans">
      <p>Firms come in all sizes. So do our pricing plans. You can upgrade/downgrade your plan at any time!<br />
      <?php echo link_to("View Our Hosting Plans!", "@plans", "class=tick"); ?></p>
    </div>
  </div>

  <div class="span-8 last">
    <h3>Try before you buy!</h3>
    <div class="demo_request">
      <p>We offer a <?php echo link_to("fully functional website preview", "@gallery"); ?> as part of our checkout process,
        so you can try your website before you purchase.<br />
        <?php echo link_to("Or, Request A Live Demonstration!", "@demo_request", "class=tick"); ?>
      </p>
    </div>
  </div>
</div>
<div class="span-6 last">
  <?php include_component("index", "miniGallery"); ?>
  <hr />
  <?php include_component("index", "quote"); ?>
</div>

<script type="text/javascript">
  $().ready(function(){
    $("#cta").hide().slideDown();
  });
</script>