<h1>Collect Payments through your Website</h1>


<div class="span-16 colborder">
  
<?php if(!$form -> getObject() -> getHostingPlan() -> getIncludesPaymentPage()): //customer isn't authorized to use payment page ?>
<p class="help">Payment collection functionality is only only available on  standard, deluxe and premium  hosting packages.
  To upgrade. please call customer care at <?php echo sfConfig::get("app_contact_customerservice_phone"); ?> or email us at <?php echo mail_to(sfConfig::get("app_contact_customerservice_email")); ?>.</p>
<?php endif; ?>

<?php echo $form -> renderFormTag(url_for("@payment_tools")); ?>
<?php echo $form -> renderGlobalErrors(); ?>
<?php echo $form -> renderHiddenFields(); ?>

<fieldset>
<legend>Payment Account Code</legend>
  <table>
    <?php echo $form["payment_account_id"] -> renderRow(); ?>
  </table>
  <hr />
  <p class="help">Please note: Neither EsqSites or LawPay's offering of the "pay your bill option" service or services
    constitute legal advice. Thus should not be construed as such or relied on as such. Moreover, since
    each state or jurisdiction’s laws may be different with regard to acceptance and processing of credit
    cards by attorneys, please refer to your state’s or jurisdiction’s ethical rules or rules of professional
    conduct to determine the appropriateness of accepting such forms of payment. Alternatively, please
    contact your bar association to determine whether you are permitted to accept credit card payments.</p>
</fieldset>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@homepage"); ?></li>
  <li class="sf_admin_action_save"><input type="submit" value="Update Settings"></li>
</ul>
</form>

</div>
<div class="span-5 last">
  <span>Powered by:</span>
  <?php echo link_to(image_tag("lawpay_logo.jpg", array("alt_title" => "LawPay - Credit Card Processing For Lawyers")), sfConfig::get("app_lawpay_landing_url"), array("popup" => true)); ?>
  <hr />
  <p>To obtain your Payment Account Code, simply complete this <?php echo link_to("online merchant account application form", sfConfig::get("app_lawpay_signup_url"), array("popup" => true)); ?> or call 866 376 0950.</p>
  <p>Once the application has been completed, you will be provided with a payment account code.</p>
  <p>Please enter the payment account code you are provided by LawPay in the field to the left. Your account will be activated in 24-48 hours.</p>
</div>

<br class="clear" />