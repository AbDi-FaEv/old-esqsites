<?php $item_name = get_class($items[key($items)]); ?>
<ul id="<?php echo $item_name; ?>_sort_list" class="sortable">
  <?php foreach($items as $item) { ?>
    <li id="items_<?php echo $item -> getId(); ?>" class="ui-state-default"><?php echo $item; ?></li>
  <?php } ?>
</ul>

<div id="sort_feedback"></div>
<div id="sort_status_indicator"></div>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_delete"><a href="#" id="sort_cancel" class="negative">Cancel</a></li>
  <li class="sf_admin_action_save"><a href="#" id="sort_save" class="positive">Save Order</a></li>
</ul>

<br class="clear" />

<script>
  jQuery(document).ready(function(){
    
    jQuery("#<?php echo $item_name; ?>_sort_list").sortable({ distance: 10, opacity: 0.7});
    jQuery("#sort_cancel").click(function(){
      jQuery("#<?php echo $item_name; ?>_sort_list").sortable("cancel");
      return false;
    })
    jQuery("#sort_save").click(function()
    {
      $("#sort_status_indicator").addClass("busy");
      jQuery.ajax({ 
        type: "<?php echo isset($method) ? $method : "POST"; ?>", 
        url: "<?php echo $url; ?>", 
        data: jQuery("#<?php echo $item_name; ?>_sort_list").sortable("serialize"), 
        success: function(data)
        {
          $("#sort_status_indicator").removeClass("busy");
          jQuery("#sort_feedback").html(data).addClass("notice").show("clip", {}, "normal", function(){
            setTimeout(function(){
              $("#sort_feedback").removeClass("notice").hide("clip");
            }, 1000);
            
          }); //fade away the feedback?
        }, 
        error: function(request, message){
          alert(message); //better way?
        }
      });
      return false;
    })
  });
</script>