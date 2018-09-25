<div id="sf_admin_container">
<div id="sf_admin_content" class="show">

<h1><?php echo $customer -> getTypeString(); ?>: <?php echo $customer -> getFullName(); ?> <?php echo $customer -> getStatus() == Customer::STATUS_ACTIVE ? image_tag("lightbulb") : image_tag("lightbulb_off"); ?></h1>

<?php include_partial("flashes"); ?>

<div id="sidebar">
  <div id="comments">
    <?php include_component('sfComment', 'commentList', array('object' => $customer, "order" => "desc")); ?>
  </div>
  <?php include_component('sfComment', 'commentForm', array('object' => $customer)); ?>
</div>

<div id="main_area">

  <div style="width:50%;float:left;">

<fieldset>
  <legend>Customer Info</legend>
<table>
  <tr><th>Name:</th><td><?php echo $customer -> getFullName(); ?></td></tr>
  <tr><th>Username:</th><td><?php echo $customer -> getUsername(); ?></td></tr>
  <tr><th>Registered:</th><td><?php echo $customer -> getCreatedAt("m/d/Y H:i:s"); ?> (<?php echo time_ago_in_words($customer -> getCreatedAt("U")); ?> ago)</td></tr>
  <?php if($customer -> getLastLogin()): ?>
    <tr><th>Last Login:</th><td><?php echo $customer -> getLastLogin("m/d/Y H:i:s"); ?> (<?php echo time_ago_in_words($customer -> getLastLogin("U")); ?> ago)</td></tr>
  <?php else: ?>
    <tr><th>Last Login:</th><td>never</td></tr>
  <?php endif; ?>
  <tr><th>Status:</th><td><?php echo $customer -> getStatusString(); ?></td></tr>
  <tr>
    <th>Bar Association:</th>
    <td>
      <?php echo ($association = $customer -> getBarAssociation()) ? link_to($association, "bar_association_admin_edit", $association) : "-"; ?>
      <?php if($association && $customer -> getCreditBarAssociation()) echo "(credited)"; ?>
    </td>
  </tr>
  <tr><th>Email Address:</th><td><?php echo mail_to($customer -> getEmail()); ?></td></tr>
  <tr><th>Birthdate:</th><td><?php echo $customer -> getBirthdate() ? $customer -> getBirthdate("m/d/Y") : "not entered"; ?></td></tr>
  <tr><th>Phone:</th><td><?php echo is_numeric($customer -> getPhone()) ? format_phone($customer -> getPhone()) : $customer -> getPhone(); ?></td></tr>
  <tr><th>Fax:</th><td><?php echo is_numeric($customer -> getFax()) ? format_phone($customer -> getFax()) : $customer -> getFax(); ?></td></tr>
  <tr><th>Referral Code:</th><td><?php echo $customer -> getReferralCode(); ?></td></tr>
</table>

  <?php if(isset($welcome_form)): ?>
  <?php echo link_to("Re-Send Welcome Email", "customer_resendWelcome", $customer, array("id" => "resend_welcome_toggle")); ?>
  <div id="resend_welcome_form">
    <?php echo $welcome_form -> renderFormTag(url_for("customer_resendWelcome", $customer)); ?>
    <?php echo $welcome_form; ?>
    <input type="submit" value="Resend Email" />
    </form>
  </div>
  <script>
    $(document).ready(function(){
      <?php if(!$welcome_form -> isBound()): ?>
      $("#resend_welcome_form").hide();
      <?php endif; ?>
      $("#resend_welcome_toggle").show().click(function(){
        $("#resend_welcome_form").slideToggle();
        return false;
      })
    });
  </script>
  <?php endif; ?>

</fieldset>


<?php if($customer -> countWebsites() == 1): ?>
<fieldset>
  <legend>CheddarGetter Info</legend>
  <?php $website = $customer -> getWebsites() -> getFirst(); ?>
  <?php if($website -> getCgId()): ?>
    <?php if($website -> getLastPaymentUpdate()): ?>
      <p>Last Payment Info Update: <?php echo $website -> getLastPaymentUpdate("m/d/Y H:i:s"); ?></p>
    <?php endif; ?>
    <?php if(($transactions = $website -> getCgTransactions()) && count($transactions)): ?>
      <table width="100%">
        <tr>
          <th>Invoice #</th>
          <th>Date</th>
          <th>Amount</th>
          <th>Result</th>
        </tr>
        <?php foreach($transactions as $transaction): ?>
          <?php if($transaction -> getType() == CheddarGetterNotification::TYPE_TRANSACTION): ?>
            <tr>
              <td><?php echo $transaction -> getInvoiceNumber(); ?></td>
              <td><?php echo $transaction -> getCreatedAt('m/d/Y'); ?></td>
              <td><?php echo format_currency($transaction -> getAmount(), '$'); ?></td>
              <td><span class="transaction_<?php echo $transaction -> getResult(); ?>"><?php echo $transaction -> getResult(); ?></span></td>
            </tr>
          <?php elseif($transaction -> getType() == CheddarGetterNotification::TYPE_CANCELLATION): ?>
            <tr>
              <td>n/a</td>
              <td><?php echo $transaction -> getCreatedAt('m/d/Y H:i:s'); ?></td>
              <td>n/a</td>
              <td><span class="transaction_canceled">Canceled</span></td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>
    <?php echo link_to_cg_account($website -> getCgId(), "View CG Account"); ?>
  <?php else: ?>
    <p>This client does <strong>NOT</strong> have a CheddarGetter Account</p>
    <p>To start a CG account for this client, have the client update their payment info.</p>
  <?php endif; ?>
</fieldset>
<?php endif; ?>

  <?php if($customer -> getIcontactId()): ?>
    <?php include_component("customers", "mailingListInfo", array("customer" => $customer)); ?>
  <?php endif; ?>

  </div>
  <div style="width:45%;float:left;margin-left:10px;">

<fieldset>

<legend>Websites (<?php echo count($websites = $customer -> getWebsites()); ?>) <?php echo link_to("show all", "@website?filters[customer_id]=".$customer -> getId()); ?></legend>

<div id="websites">
<?php foreach($websites as $website): ?>
	<div class="website">
		<div class="header"><?php echo link_to($website, "website_show", $website); ?> <?php echo $website -> getStatus() == Website::STATUS_ACTIVE ? image_tag("lightbulb", "alt=Active title=Active") : image_tag("lightbulb_off", "alt=Inactive title=Inactive"); ?></div>

        <div class="sf_admin_row">
        <table>
          <tr>
            <th>Plan:</th>
            <td>
              <?php if($plan = $website -> getHostingPlan()): ?>
                <?php echo link_to($plan, "website_attribute_edit", $plan); ?>
              <?php else: ?>
                <p>No plan (probably an error)</p>
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th>Template:</th>
            <td>
              <?php if($template = $website -> getWebsiteTemplate()): ?>
                <?php echo link_to(thumbnail_tag($template -> getImageUrl(), 50, 40), "website_template_edit", $template); ?><br />
                <?php echo $template; ?>
              <?php else: ?> - <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th>Coupons:</th>
            <td>
              <?php if(count($coupons = $website -> getCouponUsages())): ?>
              <?php foreach($coupons as $coupon): ?>
                <?php echo $coupon; ?><br />
              <?php endforeach; ?>
              <?php else: ?> - <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th>Last Billing Date:</th>
            <td><?php echo $website -> getLastBillingDate() ? $website -> getLastBillingDate("m/d/Y") : "never"; ?></td>
          </tr>
        </table>
        </div>

        <?php include_partial("websites/domains", array("website" => $website)); ?>

	</div>

	<div>
	</div>
<?php endforeach; ?>
</div>
</fieldset>

  </div>

<hr class="break" />

<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "customer"); ?></li>
  <?php if($customer -> isReal()): ?>
  <?php if($sf_user -> hasCredential("customer_cancel") && ($customer -> getStatus() == Customer::STATUS_ACTIVE)): ?>
    <li class="sf_admin_action_delete"><?php echo link_to("Cancel", "customer_cancel", $customer); ?></li>
  <?php endif; ?>
  <?php if($sf_user -> hasCredential("customer_edit")): ?>
    <li class="sf_admin_action_edit"><?php echo link_to("Edit", "customer_edit", $customer); ?></li>
  <?php endif; ?>
    <li><?php echo link_to("Apply Coupon", "customer_addCoupon", $customer); ?></li>
  <?php if($sf_user -> hasCredential("customer_access_dashboard")): ?>
    <?php $controller = sfConfig::get("sf_environment") == "dev" ? "/members_dev.php" : "/members.php"; ?>
    <li><?php echo link_to("Login To Dashboard", $controller."/login?login[username]=".urlencode($customer -> getUsername())."&login[password]=".urlencode($customer -> getPassword()), array("target" => "_blank", "method" => "post")); ?></li>
  <?php endif; ?>
  <?php else: ?>
    <li class="sf_admin_action_delete"><?php echo link_to("Delete", "customer_delete", $customer, array("confirm" => "Delete This Shopper? Are you sure?", "method" => "delete")); ?></li>
  <?php endif; ?>
</ul>


</div>

<br class="clear" />

</div>
</div>