<div id="sf_admin_container">
<div id="sf_admin_content">

<ul id="sort_list" class="sortable">
<?php foreach($items as $item) { ?>
	<li id="items_<?php echo $item -> getId(); ?>" class="ui-state-default"><?php echo $item; ?></li> 
<?php } ?>
</ul>

<div class="feedback"></div>
<div class="status_indicator"></div>

<ul class="sf_admin_actions">
	<li class="sf_admin_action_delete"><a href="#" id="sort_cancel">Cancel</a></li>
	<li class="sf_admin_action_save"><a href="#" id="sort_save">Save Order</a></li>
</ul>

</div>
</div>

<script language="JavaScript" type="text/javascript">
  $().ready( function(){
	$("#sort_list").sortable({ distance: 10, opacity: 0.7});
});
</script>
