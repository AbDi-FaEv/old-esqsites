<div id="flash">Your have to download the flash plugin to view this content.</div>

<script>
  $(document).ready(function(){
    swfobject.embedSWF("/flash/player_flv.swf", "flash", "800", "482", "9", "/js/swfobject/expressInstall.swf", {flv:'/uploads/tutorials/<?php echo $tutorial["file"]; ?>', autoload: 1, autoplay: 1, title: '<?php echo $tutorial["title"]; ?>'});
  });
</script>