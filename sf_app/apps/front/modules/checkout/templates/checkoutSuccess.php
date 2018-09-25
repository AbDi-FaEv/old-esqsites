<h1><strong>Step 5:</strong> Purchase Your Website</h1>

<p>Almost done... After you complete the form below, your website will be online immediately.</p>

<?php if($form -> hasErrors()): ?>
<div id="main_error" class="error">
  <p>There are issues with your form submission. Please check the highlighted fields below.</p>
</div>
<?php endif; ?>

<?php echo $form -> renderFormTag(url_for("@checkout")); ?>
<?php echo $form -> renderGlobalErrors(); ?>
<?php echo $form -> renderHiddenFields(); ?>
<?php include_stylesheets_for_form($form); ?>

<div class="span-17">

  <?php echo $form -> renderGlobalErrors(); ?>

<fieldset class="form">
  <legend>1. Choose Your Domain Name</legend>

  <?php if(isset($domain_recommendations) && $domain_recommendations): ?>
  <div class="span-6 colborder">
    <?php if($salutation = $sf_user -> getSalutation()): ?>
      <h4><?php echo $salutation; ?>, here are a few names for your website that are available.</h4>
    <?php else: ?>
      <h4>Here are a few names for your website that are available.</h4>
    <?php endif; ?>
    <?php include_partial("checkout/domainRecommendations", array("domains" => $domain_recommendations)); ?>
  </div>
  <script>
    $().ready(function(){
      $(".domain_names a").click(function(){
        $("#checkout_domain_name").val($(this).html().replace(".com", ""));
        return false;
      });
    });
  </script>
  <?php else: ?>
  <script language="JavaScript" type="text/javascript">
    var available_domains = [];
  </script>
  <?php endif; ?>
  <div class="span-<?php echo $domain_recommendations ? "8" : "15"; ?>">
    <?php if($salutation = $sf_user -> getSalutation()): ?>
      <p><?php echo $salutation; ?>, would you like to:</p>
    <?php else: ?>
      <p>Would you like to:</p>
    <?php endif; ?>

    <?php echo $form["domain"]["type"] -> renderError(); ?>
    <?php echo $form["domain"]["type"]; ?>

    <p>Please enter your desired domain name to use with your website. 
      Either you already own it or you can register a new one here.</p>

    <div id="domain_message"></div>

    <div>
      <?php echo $form["domain"]["name"] -> renderError(); ?>
      <?php echo $form["domain"]["name"]; ?>
      <?php echo image_tag("buttons/check_availability.jpg", array("id" => "domain_check_button")); ?>
    </div>
    
    <div id="domain_buttons">
      <?php echo image_tag("buttons/domain_cancel.jpg", array("id" => "domain_cancel")); ?>
      <?php echo image_tag("buttons/domain_proceed.jpg", array("id" => "domain_proceed")); ?>
    </div>

  </div>
</fieldset>
</div>
<div class="span-7 last">
  <?php include_component("checkout", "miniReceipt"); ?>
</div>

<div class="span-24 last" id="checkout_form_container">

  <div class="span-12">

  <fieldset id="preview_info">
    <legend>2. Verify Your Website Info</legend>
    <div class="form stacked">
      <div>
        <?php echo $form["website_info"]["plan"] -> renderRow() ; ?>
      </div>
      <div class="two-col">
        <div>
          <?php echo $form["website_info"]["first_name"] -> renderRow() ; ?>
        </div>
        <div>
          <?php echo $form["website_info"]["last_name"] -> renderRow() ; ?>
        </div>
      </div>
      <div class="two-col">
        <div>
          <?php echo $form["website_info"]["firm_name"] -> renderRow() ; ?>
        </div>
        <div>
          <?php echo $form["website_info"]["firm_type"] -> renderRow() ; ?>
        </div>
      </div>
      <div class="clear">
        <?php echo $form["website_info"]["email"] -> renderRow() ; ?>
      </div>
      <div>
        <?php echo $form["website_info"]["address"] -> renderRow() ; ?>
      </div>
      <div class="two-col">
        <div>
          <?php echo $form["website_info"]["city"] -> renderRow() ; ?>
        </div>
        <div class="two-col">
          <div>
            <?php echo $form["website_info"]["state"] -> renderRow() ; ?>
          </div>
          <div>
            <?php echo $form["website_info"]["zip"] -> renderRow() ; ?>
          </div>
        </div>
      </div>
      <div class="two-col clear">
        <div>
          <?php echo $form["website_info"]["phone"] -> renderRow() ; ?>
        </div>
        <div>
          <?php echo $form["website_info"]["fax"] -> renderRow() ; ?>
        </div>
      </div>
    </div>
  </fieldset>

  </div>
  <div class="span-12 last">

  <fieldset>
    <legend>3. Choose Your Login Information</legend>
    <div class="form stacked">
      <div class="two-col">
        <div><?php echo $form["account"]["username"] -> renderRow(); ?></div>
        <div><?php echo $form["account"]["password"] -> renderRow(); ?></div>
      </div>
    </div>
  </fieldset>

  <fieldset>
    <legend>4. Enter Your Payment Information</legend>
    <div class="form stacked">
      <div class="two-col">
        <div>
          <?php echo $form["cc"]["first_name"] -> renderRow(); ?>
        </div>
        <div>
          <?php echo $form["cc"]["last_name"] -> renderRow(); ?>
        </div>
      </div>
      <div>
        <div>
          <?php echo $form["cc"]["number"] -> renderRow(); ?>
        </div>
      </div>
      <div class="two-col">
        <div><?php echo $form["cc"]["type"] -> renderRow(); ?></div>
        <div><?php echo $form["cc"]["expiration_date"] -> renderRow(); ?></div>
      </div>
    </div>
  </fieldset>

  <fieldset>
    <legend>5. Do you have a Coupon Code?</legend>
    <ul class="form">
      <?php echo $form["coupon_code"] -> renderError(); ?>
      <?php echo $form["coupon_code"] -> render(); ?>
    </ul>
  </fieldset>

  <div class="span-3" align="center">
    <div class="AuthorizeNetSeal">
      <script type="text/javascript" language="javascript">var ANS_customer_id='<?php echo sfConfig::get("app_authorize_dot_net_customer_id"); ?>';</script>
      <script type="text/javascript" language="javascript" src="//VERIFY.AUTHORIZE.NET/anetseal/seal.js" ></script>
      <a href="http://www.authorize.net/" id="AuthorizeNetText" target="_blank">Credit Card Processing</a>
    </div>
  </div>
  <div class="span-6 form">
    <?php echo $form["agree_to_terms"] -> renderError(); ?>
    <?php echo $form["agree_to_terms"] -> render(); ?>
    <strong>I agree to the <?php echo link_to("terms and conditions", "@terms", array("target" => "_blank")); ?></strong><span class="required">*</span>
    <br /><br />
    <?php echo $form["allow_mailing"] -> render(); ?>
    <span>I would like to receive EsqSites's free email newsletter. (You can unsubscribe at any time)</span>
    <br /><br />
    <input type="image" src="<?php echo image_path("buttons/checkout.jpg"); ?>" />
  </div>
  <!-- end of form elements -->

  </div>
</div>
</form>

<script language="JavaScript" type="text/javascript">

  function handle_domain_change()
  {
      $("#domain_message").empty();
      $("#checkout_form_container").hide()
      $("#domain_proceed").hide();
      $("#domain_cancel").hide();

      var current_domain = $("#checkout_domain_name").val()+"."+$("#checkout_domain_name_type").val();
      var is_valid = false;
      for(i = 0;i < available_domains.length; i++)
      {
        if(current_domain.toLowerCase() == available_domains[i].toLowerCase())
        {
          is_valid = true;
        }
      }

      if(is_valid)
      {
          $("#domain_proceed").show();
          $("#domain_cancel").show();
          $("#domain_check_button").hide();
      }
      else
      {
          if($("#checkout_domain_type_<?php echo Domain::REGISTRATION_TYPE_OTHER; ?>").attr('checked') && ($("#checkout_domain_name").val() != ""))
          {
              $("#domain_proceed").show();
              $("#domain_cancel").show();
          }
          else
          {
              if($("#checkout_domain_name").val() != "")
              {
                  $("#domain_check_button").show();
              }
              else
              {
                  $("#domain_check_button").hide();
              }
          }
      }
  }

  function refresh_order_summary()
  {
    var $new = $("#checkout_domain_type_<?php echo Domain::REGISTRATION_TYPE_ESQ; ?>").attr('checked') ? '<?php echo Domain::REGISTRATION_TYPE_ESQ; ?>' : '<?php echo Domain::REGISTRATION_TYPE_OTHER; ?>';
    var $plan = $("#checkout_website_info_plan").val();
    var $data = {domain_type: $new, hosting_plan: $plan};
    $("#order_summary").css('opacity', 0.5).parent().load('<?php echo url_for("@order_summary"); ?>', $data);
  }

  $().ready( function(){

      $("#domain_check_button").hide();
      $("#domain_proceed").hide();
      $("#domain_cancel").hide();

      <?php if(!$form -> isBound()): ?>
        $("#checkout_form_container").hide();
        handle_domain_change();
      <?php else: ?>
        $().scrollTo( '#main_error', { duration:0, offset:-50 });
        refresh_order_summary();
      <?php endif; ?>

      $("#checkout_website_info_plan").change(function(){
        refresh_order_summary();
      });

      $("#checkout_domain_name").keyup(function()
      {
        handle_domain_change();
      });

      $("#checkout_domain_extension").change(function()
      {
        handle_domain_change();
      });

      $("#domain_cancel").click(function()
      {
        $("#checkout_domain_name").val('').focus();
        $(this).hide();
        $("#domain_proceed").hide();
        $("#domain_message").empty();
      });

      $("#domain_proceed").click(function()
      {
        $(this).hide();
        $("#domain_cancel").hide();
        $("#checkout_form_container").show();
        $().scrollTo( '#checkout_form_container', { duration:500, offset:-50 });
      });

      $(".domain_names a").click(function()
      {
        if(!$("#checkout_domain_type_<?php echo Domain::REGISTRATION_TYPE_ESQ; ?>").attr('checked'))
        {
          $("#checkout_domain_type_<?php echo Domain::REGISTRATION_TYPE_ESQ; ?>").attr('checked', true);
          refresh_order_summary();
        }
        $("#domain_check_button").hide();
        $("#checkout_form_container").hide();
        $("#checkout_domain_name").val($(this).html().replace(".com", ""));
        $("#domain_message").empty();
        $("#domain_proceed").show();
        $("#domain_cancel").show();
        return false;
      });

      $("#checkout_domain_type_<?php echo Domain::REGISTRATION_TYPE_ESQ; ?>").click(function(){
        $("#checkout_domain_name").select().focus();
        handle_domain_change();
        refresh_order_summary();
      });

      $("#checkout_domain_type_<?php echo Domain::REGISTRATION_TYPE_OTHER; ?>").click(function(){
        $("#checkout_domain_name").select().focus();
        $("#domain_check_button").hide();
        handle_domain_change();
        refresh_order_summary();
      });

      $("#domain_check_button").click(function()
      {
          var domain_name = $("#checkout_domain_name").val();
          var domain_type = $("#checkout_domain_name_type").val();
          var domain_reg_type = 1;

    var url = '<?php echo url_for("@check_domain"); ?>?domain_name=' +  domain_name + '&domain_type=' + domain_type + '&domain_reg_type=' + domain_reg_type + '&random=' + Math.random();

          $("#domain_message").show().html('<?php echo image_tag("progressbar.gif"); ?>');
          $.post(url, null, function(data){
              eval("var response = " + data);

              $("#domain_message").html(response.message);

              if(response.result == true)
              {
                  $("#domain_check_button").hide();
                  $("#domain_proceed").show();
                  $("#domain_cancel").show();
              }
              else
              {
                  $("#domain_proceed").hide();
                  $("#domain_cancel").hide();
                  $("#domain_check_button").hide();
                  $("#checkout_form_container").slideUp();
              }

          });

      });

  });
</script>