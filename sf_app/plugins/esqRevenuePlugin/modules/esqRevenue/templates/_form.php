<?php echo $form -> renderFormTag(url_for("@revenue")); ?>
  <?php echo $form["month"] -> renderError(); ?>
  <?php echo $form["month"] -> render(); ?>
  <?php if(isset($form["year"])): ?>
    <?php echo $form["year"] -> renderError(); ?>
    <?php echo $form["year"] -> render(); ?>
  <?php endif; ?>
  <?php if(isset($form["bar_association_id"])): ?>
    <?php echo $form["bar_association_id"] -> renderError(); ?>
    <?php echo $form["bar_association_id"] -> render(); ?>
  <?php endif; ?>
  <input type="submit" value="GO">
</form>