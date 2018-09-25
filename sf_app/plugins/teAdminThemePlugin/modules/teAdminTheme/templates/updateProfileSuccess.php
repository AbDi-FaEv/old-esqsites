<div id="sf_admin_container">
  <div id="sf_admin_content">
    <h1>Update Your Profile</h1>

    <?php include_partial("flashes"); ?>

    <?php echo $form -> renderFormTag(url_for("@te_profile_update")); ?>
      <table class="te_admin_table">
        <?php echo $form -> renderUsing("table"); ?>
      </table>
    <ul class="sf_admin_actions">
      <li class="sf_admin_action_list"><?php echo link_to("Cancel", "@homepage"); ?></li>

      <li class="sf_admin_action_save"><input type="submit" value="Update Profile" /></li>
    </ul>
    <br class="clear" />
    </form>
    
  </div>
</div>
