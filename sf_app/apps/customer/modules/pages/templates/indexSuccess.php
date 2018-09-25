<h1>Your Website Pages</h1>

<div id="sidebar">
  <div class="note messagebox">
    <p>You currently have <strong><?php echo $website -> getNumActivePages(); ?> out of <?php echo $website -> getHostingPlan() -> getNumPages(); ?></strong> page(s) activated.</p>
    <!--
    <p>To activate additional pages, click <?php echo link_to("here", "websites/editHostingPlan"); ?> to upgrade your account.</p>
    -->
    <p>To activate additional pages, please contact us about upgrading your account.</p>
  </div>
</div>

<div id="main_area">

<?php include_partial("global/flashes"); ?>

<fieldset>
  <legend>Main Menu</legend>
  <p>These pages appear in the main menu of your website</p>
  <?php include_partial("pagetable", array("pages" => $website -> getPagesByMenuType(Website::MENU_TYPE_MAIN))); ?>
  
  <ul class="sf_admin_actions">
    <li class="sf_admin_action_save"><?php echo link_to("Add New Page", "page_new"); ?></li>
  </ul>
</fieldset>

<fieldset>
  <legend>Sub Menu</legend>
  <p>These pages appear in the sub-menu of your website, i.e.: disclaimer, sitemap</p>
  <?php include_partial("pagetable", array("pages" => $website -> getPagesByMenuType(Website::MENU_TYPE_FOOTER))); ?>
</fieldset>

<?php if(false): ?>
<fieldset>
  <legend>Other Pages</legend>
  <p>These pages do not appear directly on your website menus (i.e.: website "error" page used for users who mistype page URLs on your website )</p>
  <?php include_partial("pagetable", array("pages" => $website -> getPagesByMenuType(Website::MENU_TYPE_OTHER))); ?>
</fieldset>
<?php endif; ?>

</div>

<script language="JavaScript" type="text/javascript">
$().ready( function(){
	$(".status_toggle").mouseover(function()
  {
    $(this).parent("td").toggleClass("green").toggleClass("red");
    if($(this).html() == "Active")
    {
      $(this).html("[Deactivate]");
    } 
    else
    {
      $(this).html("[Activate]");
    } 
  }).mouseout(function()
  {
    $(this).parent("td").toggleClass("green").toggleClass("red");
    if($(this).html() == "[Deactivate]")
    {
      $(this).html("Active");
    } 
    else
    {
      $(this).html("Inactive");
    } 
  });
});
</script>
