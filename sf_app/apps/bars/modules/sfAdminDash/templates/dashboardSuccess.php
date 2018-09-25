<?php
  use_helper('I18N');
  /** @var Array of menu items */ $items = $sf_data->getRaw('items');
  /** @var Array of categories, each containing an array of menu items and settings */ $categories = $sf_data->getRaw('categories');
?>

<div id="sf_admin_dashboard_slot">
  <?php include_component_slot('sf_admin_dashboard_slot') ?>
</div>

<div id="sf_admin_container">

  <div id="livehelp">
  <script type="text/javascript">
  document.write(unescape("%3Cscript src='<?php echo $sf_request -> isSecure() ? 'https' : 'http'; ?>://www.livehelpnow.net/lhn/scripts/lhnvisitor.aspx?div=&amp;zimg=35&amp;lhnid=2617&amp;iv=&amp;iwidth=144&amp;iheight=60&amp;zzwindow=0&amp;d=0&amp;custom1=&amp;custom2=&amp;custom3=' type='text/javascript'%3E%3C/script%3E"));</script>
    <br />
    <span>Click For Live Help</span>
  </div>

  <h1><?php echo $sf_user -> getProfile(); ?> &ndash; Dashboard</h1>

  <?php include_partial("global/flashes"); ?>

  <p>Welcome to the ESQSites Dashboard, <strong><?php echo $sf_user; ?></strong>. You have a wide array of features available which allow you to manage your dashboard.  Just click on any of the icons below to get started.</p>

  <?php include_component("index", "signupChart"); ?>
  
  <div id="dashboard_buttons">

  <?php if (count($items)): ?>
    <?php include_partial('dash_list', array('items' => $items)); ?>
  <?php endif; ?>

  <?php if (count($categories)): ?>
    <?php foreach ($categories as $name => $category): ?>
      <?php if (sfAdminDash::hasPermission($category, $sf_user)): ?>
        <h2><?php echo __(isset($category['name']) ? $category['name'] : $name, null, 'sf_admin_dash'); ?></h2>
        <?php include_partial('dash_list', array('items' => $category['items'])); ?>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php endif; ?>

  </div>

  <div id="dashboard_info">
  <?php $bar = $sf_user -> getProfile(); ?>

  <?php if($bar -> getAffinityExpirationDate()): ?>
    <h3>Affinity Agreement valid through:</h3>
    <ul>
      <li>
    <?php echo $bar -> getAffinityExpirationDate("F jS, Y"); ?>
    <?php if($bar -> isAffinityExpired()): ?>
      (Expired)
    <?php endif; ?>
      </li>
    </ul>
  <?php endif; ?>
  
  <?php if($bar -> hasLandingPage()): ?>
  <h3>Your Landing Page:</h3>
  <ul id="jump_page_info">
    <li><a href="<?php echo $bar -> getLandingPageUrl(); ?>" target="_blank"><?php echo $bar -> getLandingPageUrl(); ?></a></li>
  </ul>
  <?php endif; ?>

  <script>
    $().ready(function(){
      $("#jump_page_info input").click(function(){
        $(this).select();
      });
    });
  </script>

  </div>

</div>