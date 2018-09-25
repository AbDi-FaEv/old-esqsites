<div id="pre_footer" class="span-23 box last">
  <div class="span-7 colborder">
    <h3>Our Services</h3>
    <ul class="services">
      <li><?php echo link_to("Web-Design", "@gallery"); ?></li>
      <li><?php echo link_to("Domain Name Registration", "@te_faq"); ?></li>
      <li><?php echo link_to("Hosting", "@plans"); ?></li>
      <li><?php echo link_to("Email Forwarding", "@tutorials"); ?></li>
      <li><?php echo link_to("Online Marketing", "@coming_soon"); ?></li>
      <li><?php echo link_to("Search Engine Optimization", "@coming_soon"); ?></li>
    </ul>
  </div>
  <div class="span-8 colborder" id="blogbox">
    <h3>From Our Blog:</h3>
    <?php include_component("teBlog", "recentPosts"); ?>
    <?php echo link_to("Subscribe", "@te_blog?sf_format=rss", array("class" => "rss")); ?>

  </div>
  <div class="span-6 last" id="twitterbox">
    <div id="twitter_logo">
      <a href="<?php echo sfConfig::get("app_teTwitterPlugin_url", "http://www.twitter.com"); ?>" title="Follow Us On Twitter!"><?php echo image_tag("/teTwitterPlugin/images/twitter_logo", array("id" => "twitterbird", "alt_title" => "Follow Us On Twitter!")); ?></a>
      <h3>Follow us on Twitter!</h3>
    </div>
    <?php if (!preg_match("#\.local#", $_SERVER['SERVER_NAME'])) { include_component("teTwitter", "recent"); } ?>
  </div>
</div>
<div id="footer" class="span-24 last">
  <p>Copyright &copy; <?php echo date("Y"); ?> ESQ Sites123.com - All rights reserved.</p>
  <div>
    <script type="text/javascript" src="https://sealserver.trustwave.com/seal.js?codeV2e34a675fb4a28a42665caed45a117"></script>
  </div>
</div>
