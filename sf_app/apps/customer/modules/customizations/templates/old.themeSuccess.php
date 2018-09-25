<?php decorate_with("layout_wrapped"); ?>

<h1>Theme Customization</h1>

<?php include_partial("esqTemplateSelector/template_nav"); ?>

<p>The template you have selected supports the following "Themes".</p>

<table>
<?php foreach($themes as $key => $theme): ?>
  <tr class="<?php if($selected = ($key == $current_theme)) echo 'selected'; ?>">
    <td><div class="theme-color" style="border: 1px solid black;padding: 2px;width: 30px;height: 30px;background-color: #<?php echo $theme["color"]; ?>;"></div></td>
    <td><?php echo $theme["name"]; ?></td>
    <td>
      <?php if($selected): ?>
        Selected
      <?php else: ?>
        <?php echo link_to("Select", "@customize?action=theme&theme=".$key, array('method' => 'PUT')); ?>
      <?php endif; ?>
    </td>
  </tr>
<?php endforeach; ?>
</table>

<hr />

<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "template_select"); ?></li>
</ul>