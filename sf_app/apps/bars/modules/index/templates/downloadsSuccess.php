<div id="downloads">

<h2>Resources/Downloads</h2>

<ul style="float:right;" class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@homepage"); ?></li>
</ul>

<p>Below you find ESQ logos and print ads for use in publications and on the web.<br />To download items, simply right-click on them and select: "Save As..."</p>

<hr />

<div class="section">

<h3>Print/Display Ads</h3>

<table class="lines">
  <tr>
    <td>
      <?php $file = "/uploads/bars/Halloween.png"; ?>
      <a href="<?php echo $file; ?>" target="_blank">
        <img src="/uploads/bars/Halloween.png" width="80" alt="ESQ Halloween Ad" title="ESQ Halloween Ad" class="left" />
      </a>
      <p class="description">ESQ Halloween Ad (PNG, 757x863), for usage around Halloween.</p>
      <p class="description fileinfo">
        <?php $file = sfConfig::get("sf_web_dir").$file; ?>
        Size: <?php echo format_filesize($file); ?> <br /> Last Modified: <?php echo date("m-d-Y", filemtime($file)); ?>
      </p>
    </td>
  </tr>
  <tr>
    <td>
      <?php $file = "/uploads/bars/Piece of Cake!.png"; ?>
      <a href="<?php echo $file; ?>" target="_blank">
        <img src="/uploads/bars/Piece of Cake!.png" width="80" alt="ESQ Piece of Cake Ad" title="ESQ Piece of Cake Ad" class="left" />
      </a>
      <p class="description">ESQ Piece of Cake Ad (PNG, 758x864), for general usage.</p>
      <p class="description fileinfo">
        <?php $file = sfConfig::get("sf_web_dir").$file; ?>
        Size: <?php echo format_filesize($file); ?> <br /> Last Modified: <?php echo date("m-d-Y", filemtime($file)); ?>
      </p>
    </td>
  </tr>
  <tr>
    <td>
      <?php $file = "/uploads/bars/esq_ad_300_250.jpg"; ?>
      <a href="<?php echo $file; ?>" target="_blank">
        <img src="/uploads/bars/esq_ad_300_250.jpg" width="80" alt="ESQ General Ad" title="ESQ General Ad" class="left" />
      </a>
      <p class="description">ESQ General Ad (JPG, 300x250), for general usage.</p>
      <p class="description fileinfo">
        <?php $file = sfConfig::get("sf_web_dir").$file; ?>
        Size: <?php echo format_filesize($file); ?> <br /> Last Modified: <?php echo date("m-d-Y", filemtime($file)); ?>
      </p>
    </td>
  </tr>
  <tr class="last">
    <td>
      <?php $file = "/uploads/bars/esq_print_ad_4.8x4.8.pdf"; ?>
      <a href="<?php echo $file; ?>" target="_blank">
        <img src="/uploads/bars/esq_ad_small.jpg" alt="ESQ Ad Banner" title="ESQ Ad Banner" class="left" />
      </a>
      <p class="description">ESQ Advertising Banner (Size: 4.8 x 4.8), for usage in print media, brochures, newsletters.</p>
      <p class="description fileinfo">
        <?php $file = sfConfig::get("sf_web_dir").$file; ?>
        Size: <?php echo format_filesize($file); ?> <br /> Last Modified: <?php echo date("m-d-Y", filemtime($file)); ?>
      </p>
    </td>
  </tr>
</table>
</div>

<div class="section">
  <h3>ESQ Logos</h3>

  <table class="lines">
    <tr>
      <td>
        <?php $file = "/uploads/bars/ESQ Logos.pdf"; ?>
        <a href="<?php echo $file; ?>" target="_blank">ESQ Logos <span class="note">(Vector Art)</span></a>
        <p class="description">These logos are highly scalable to be used for print media.</p>
        <p class="description fileinfo">
          <?php $file = sfConfig::get("sf_web_dir").$file; ?>
          Size: <?php echo format_filesize($file); ?> <br /> Last Modified: <?php echo date("m-d-Y", filemtime($file)); ?>
        </p>
      </td>
    </tr>
    <tr class="last">
      <td>
        <?php $file = "/uploads/bars/esq_logo_350x90.jpg"; ?>
        <a href="<?php echo $file; ?>" target="_blank">
          <img src="/uploads/bars/esq_logo_350x90.jpg" width="140" alt="ESQ Logo" title="ESQ Logo" />
        </a>
        <p class="description">ESQ Logo (JPEG, 350x90), for usage in online media, web, email.</p>
        <p class="description fileinfo">
          <?php $file = sfConfig::get("sf_web_dir").$file; ?>
          Size: <?php echo format_filesize($file); ?> <br /> Last Modified: <?php echo date("m-d-Y", filemtime($file)); ?>
        </p>
      </td>
    </tr>
  </table>

</div>

<div class="section last">
  <h3>Documents</h3>
  <table class="lines">
    <tr class="last">
      <td>
        <?php $file = "/uploads/bars/Bar Affinity Agreement.doc"; ?>
        <a href="<?php echo $file; ?>" target="_blank">
          Bar Affinity Agreement
        </a>
        <p class="description">This is the standard Affinity Agreement between ESQSites and bar associations.</p>
        <p class="description fileinfo">
          <?php $file = sfConfig::get("sf_web_dir").$file; ?>
          Size: <?php echo format_filesize($file); ?> <br /> Last Modified: <?php echo date("m-d-Y", filemtime($file)); ?>
        </p>
      </td>
    </tr>
  </table>
</div>

<hr class="clear" />
<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@homepage"); ?></li>
</ul>

</div>