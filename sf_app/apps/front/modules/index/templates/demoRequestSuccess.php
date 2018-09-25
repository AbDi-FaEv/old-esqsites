<h1>Request a Demonstration</h1>

<div class="span-15">
  <?php echo $form -> renderFormTag(url_for("@demo_request")); ?>
  <fieldset>
  <ul class="form">
    <?php echo $form; ?>
  </ul>
  <input type="image" src="<?php echo image_path("buttons/demo_request.jpg"); ?>" value="Request A Demo" />
  </fieldset>
  </form>
</div>

<script>
  $().ready(function(){
    $("#demo_request_other_detail").closest("li").hide();
    $("#demo_request_how_did_you_hear").change(function(){
      if($(this).val() == "other")
      {
        $("#demo_request_other_detail").closest("li").show();
      }
      else
      {
        $("#demo_request_other_detail").closest("li").hide();
      }
    });
    $("#demo_request_how_did_you_hear").change(); //trigger to set default
  });
</script>

<div class="span-8">
  <p>To request a live demonstration of our web site system, please fill out the short form to the left, and we will contact you shortly to set up a web-demonstation.<p>
  <p>In a 5-10 minute online presentation we will show you how easy it is to get on the web today, create/edit your own pages, upload images & documents, and much more.</p>
</div>