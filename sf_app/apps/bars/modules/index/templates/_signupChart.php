<?php if($sf_user -> getProfile() -> getNumCustomers(true, false)): ?>

<div id="date_filter">
  <?php echo $form -> renderFormTag(url_for("@filter_chart")); ?>
  <?php echo $form["start"] -> renderLabel("From"); ?>: <?php echo $form["start"] -> render(); ?> <?php echo $form["end"] -> renderLabel("To"); ?>: <?php echo $form["end"] -> render(); ?>
  <input type="submit" value="Filter" />
  </form>
  <?php echo button_to("Reset", "@filter_chart"); ?>
</div>

<div id="signup_chart"></div>
<script type="text/javascript">
swfobject.embedSWF(
  "/flash/open-flash-chart.swf", "signup_chart", "100%", "180",
  "9.0.0", "expressInstall.swf",
  {"data-file":"<?php echo url_for("signup_data"); ?>"}
  );
</script>
<?php endif; ?>