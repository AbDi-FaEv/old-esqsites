<h1>Account Cancellation</h1>

<div class="fixed">

  <div class="cancellation">
    <h3>Canceling an Account</h3>
    <p>Obviously, the last thing we want any of our customers to do is cancel one of their service because of anything we did or did not do. If you've come to this page because you are still looking for resolution for a problem or question we have a special support team that is at your disposal: <?php echo mail_to("customercare@esqsites.com"); ?></p>
  </div>

  <div class="backup">
    <h3>Backup Your Information and Retrieve Your Email First:</h3>
    <p>Be sure you have backups of all your data and account information before you issue your cancellation request. We are not responsible for any of your account information after you notify us to cancel your account. This information includes but is not limited to your Web site and any email left on your account.</p>
  </div>

  <div class="refund">
    <h3>Refunds For Pre Payments</h3>
    <p>We do give refunds for unused full months of service. Setup fees are non refundable. All monetary transactions are in $US dollars. Refunds are sent to the current mailing address on your hosting account. If you are expecting a refund, be sure that your address is correct on your account before canceling. You can update this information in your control panel.</p>
  </div>
  
  <p>Please review the terms and agreement below for cancellation.</p>

</div>

<div class="document">

  <h2>Cancellation Terms and Agreement</h2>

  <p>This is a formal request that you would like to have your site removed from EsqSites123.com’s (ESQ) servers under the following terms.</p>

  <p>I understand that my site will be removed from ESQ’s servers and that all data, emails and files will be removed. I also understand that there may or may not be a way to restore these files and that there will be a significant charge if these files are requested to be restored. ESQ recommends that you keep your own back up of your site files at all times.

  To protect your web hosting account, the account password is required for your cancellation to be completed. Once your cancellation request has been processed, a result of the cancellation will be sent via the email address entered within the cancellation request form.

  Before canceling service, please be aware that ESQ does not offer pro rated refunds if you cancel your web hosting service during your pre paid, contracted term. When you submitted your order, you agreed to our Online Service Agreement.

  If there is a balance due on your account at the time of cancellation, we kindly request that you make payment for all services rendered to your website. Otherwise, there is a possibility that further action will be taken to recover payment.

  The domain name registration ownership will not be affected by this cancellation and will remain as the registrant's as long as all services are paid through.</p>

  <p>Thank you for using EsqSites123.com. If you have any questions about our cancellation policy, please write to us at <?php echo mail_to("customercare@esqsites123.com"); ?>.</p>

</div>

<?php echo $form -> renderFormTag(url_for("account/cancel")); ?>

<?php echo $form["accept_terms"] -> renderError(); ?>
<?php echo $form["accept_terms"] -> render(); ?>
<?php echo $form["accept_terms"] -> renderLabel(); ?>

<div id="cancellation_form_container" class="clear">

<div class="fixed">
  <p>
    You are about to cancel your ESQSites123.com hosting account.
    Please fill out the form below to ensure that your domains / email accounts are properly redirected.
    All information provided will be kept confidential and will be verified with the information that we have on file.
    Please note that cancellations can take up to 5 business days to process.
  </p>
</div>

  <ul class="form">
    <?php echo $form["domain_future"] -> renderRow(); ?>
  </ul>

  <ul class="form">
    <?php echo $form["reason"] -> renderRow(); ?>
    <?php echo $form["competitor"] -> renderRow(); ?>
  </ul>

  <ul class="sf_admin_actions">
    <li class="sf_admin_action_delete"><input type="submit" value="Confirm Account Cancellation" /></li>
  </ul>
  <br class="clear" />
</div>
</form>

<script>
  $().ready(function(){
    if(!$("#cancellation_accept_terms").attr("checked"))
    {
      $("#cancellation_form_container").hide();
    }
    $("#cancellation_accept_terms").click(function(){
      $("#cancellation_form_container").slideToggle();
    })
  })
</script>