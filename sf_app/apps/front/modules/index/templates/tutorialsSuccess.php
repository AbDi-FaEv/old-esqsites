<?php use_helper("sfThumbnail"); ?>

<h1>Video Tutorials</h1>
<p>To get the most out of your website, the following videos showcase frequently used features - where to find them & how to use them.</p>

<table class="tutorials">
  <tr>
    <?php $counter = 1; ?>
    <?php foreach($tutorials as $key => $tutorial): ?>
    <td>
      <?php echo link_to(thumbnail_tag("/uploads/tutorials/".$tutorial["image"], 200, 150, array("alt_title" => $tutorial["title"])).$tutorial["title"], "@tutorial?id=".$key, array("popup" => array("popup", "width=800,height=485,scrollbars=false"))); ?>
    </td>
    <?php if(0 == $counter % 4): ?>
    </tr><tr>
    <?php endif; ?>
    <?php $counter++; endforeach; ?>
  </tr>
</table>