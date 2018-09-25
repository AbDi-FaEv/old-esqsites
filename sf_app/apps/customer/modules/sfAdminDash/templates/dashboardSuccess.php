<div id="sf_admin_container">
  <div id="sf_admin_content">

    <div id="welcome_message">
      <div class="date"><?php echo date("l F d, Y"); ?></div>
      <p>Welcome to the ESQSites123.com website administration section, <strong><?php echo $sf_user -> getSalutation(); ?></strong>.
        From here you can manage any part of your website at any time.
        Just click on the icons below to get started.</p>
    </div>

    <?php include_partial("global/flashes"); ?>

    <div id="dashboard">
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
    <?php elseif (!count($items)): ?>
      <?php echo __('sfAdminDashPlugin is not configured.  Please see the %documentation_link%.', array('%documentation_link%'=>link_to(__('documentation', null, 'sf_admin_dash'), 'http://www.symfony-project.org/plugins/sfAdminDashPlugin?tab=plugin_readme', array('title' => __('documentation', null, 'sf_admin_dash')))), 'sf_admin_dash'); ?>
    <?php endif; ?>
    </div>

    <div id="dashboard_sidebar">
      
      <?php //include_component("account", "nextInvoice"); ?>
      <?php include_component("websites", "list"); ?>

      <?php if(false): ?>
      <div class="boxed">
        <?php echo image_tag("nf_google_analytics.jpg"); ?>

        <p>Google Analytics is the industry leader in website visitor tracking - detailed, accurate and easy to use!<p>

        <p>Ever wonder...</p>
        <ul>
          <li>Who visits my website?</li>
          <li>Where does traffic come from?</li>
          <li>Which pages drive my business?</li>
        </ul>

        <p><?php echo link_to("Click here to get started and find out!", "@google_tools", array("class" => "tick")); ?></p>

        <p>At ESQSites123.com we're very excited about offering this feature,
          as we continue to strive to help you get the most out of your website.</p>
        <p><em>&ndash; Your ESQSites123.com Team</em></p>
      </div>
      <?php endif; ?>

    </div>
    <br class="clr" />
  </div>
</div>