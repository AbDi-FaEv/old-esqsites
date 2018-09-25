<?php switch($page -> getPageContentDisplayTypeId()) {
  case Page::DISPLAY_TYPE_BLANK: //clean page
    $group = $page -> getPageGroup();
  ?>
  <div class="page_group inset" style="min-height:200px;">
    <?php echo $group -> getPageEntry(ESC_RAW); ?>
  </div>
  <?php
  break;
  case Page::DISPLAY_TYPE_LINKS: //links
  ?>
  <?php
  $total = $page -> countPageGroups();
  foreach($page -> getPageGroups() as $key => $group): ?>
    <div class="page_group inset">
      <?php include_partial("pagegroup_header", array("title" => "Link", "key" => $key, "group" => $group, "total" => $total)); ?>
      <?php $entries = $group -> getPageEntrys(); ?>
      <table>
        <tr valign="top">
          <th>Title:</th><td><?php echo $entries[0]; ?></td>
        </tr>
        <tr valign="top">
          <th>URL:</th><td><?php echo $entries[1]; ?></td>
        </tr>
        <tr valign="top">
          <th>Description:</th><td><?php echo $entries[2]; ?></td>
        </tr>
      </table>
    </div>
  <?php endforeach; ?>
  <?php 
  break;
  case Page::DISPLAY_TYPE_CASE_SUBMIT:
    $groups = $page -> getPageGroups();
  ?>
  
    <table>
      <tr valign="top">
        <th>Form Message:</th><td><?php echo $groups[0] -> getPageEntry(ESC_RAW); ?></td>
      </tr>
      <tr valign="top">
        <th>Emails:</th><td><?php echo $groups[1] -> getPageEntry(); ?></td>
      </tr>
      <tr valign="top">
        <th>Notification:</th><td><?php echo ClientMessage::getSendTypeString($groups[2] -> getPageEntry()); ?></td>
      </tr>
    </table>

  <?php
  break;
  case Page::DISPLAY_TYPE_MAP:
    $group = $page -> getPageGroup();
    $entries = $group -> getPageEntrys();
  ?>
    <table>
      <tr valign="top">
        <th width="30">Message:</th>
        <td><?php echo $entries[0] -> getData(ESC_RAW); ?></td>
      </tr>
      <tr valign="top">
        <th width="30">Office Address:</th>
        <td>
          <?php if($entries[1] -> getData()): ?>
          <?php echo $entries[1]; ?><br />
          <?php echo $entries[2]; ?>, <?php echo $entries[3]; ?> <?php echo $entries[4]; ?>
          <?php endif; ?>
        </td>
      </tr>
      <tr valign="top">
        <th width="30">Map Link:</th>
        <td>
          <?php if($entries[1] -> getData()): ?>
          <a href="http://maps.google.com/maps?daddr=<?php echo $address_link = $entries[1].', '.$entries[2].', '.$entries[3].' '.$entries[4]; ?>" target="_blank">
            <?php echo $entries[5]; ?>
          </a>
          <?php endif; ?>
        </td>
      </tr>
    </table>

    <?php if($entries[1] -> getData()): ?>

    <div class="boxed inset note">
        <h3>Test your office address directions:</h3>
        <p>To test your instant office directions, try entering a starting address in the below text field.
          Your above office address will act as a destination address.</p>
        <p>By testing your map directions you can be sure you have correctly entered your destination address.
          Be sure to delimit your starting address, city, state and zipcode with commas for best results.</p>
        <em>i.e. "7676 Hazard Center Drive, San Diego, CA 92108</em>
        <hr />
        <form target="_blank" action="http://maps.google.com/maps">
          <label for="saddr">Start address: </label>
          <input type="text" style="width:350px;" name="saddr"value="" />&nbsp;<input type="submit" value="Go" />
          <input type="hidden" name="daddr" value="<?php echo $address_link; ?>" />
          <input type="hidden" name="hl" value="en" />
        </form>

    </div>
    <?php endif; ?>

  <?php
  break;
  case Page::DISPLAY_TYPE_GROUPED: //grouped entries (w/ or /wout links)
  case Page::DISPLAY_TYPE_GROUPED_WITH_LINKS:
  ?>
  <?php 
  $total = $page -> countPageGroups();
  foreach($page -> getPageGroupsJoinPageEntries() as $key => $group): ?>
  <div class="page_group inset">
    <?php include_partial("pagegroup_header", array("title" => "Entry", "key" => $key, "group" => $group, "total" => $total)); ?>
    <?php if($entries = $group -> getPageEntrys(ESC_RAW)): ?>
    <table>
      <tr valign="top">
        <th width="30">Title:</th><td><?php echo $entries[0]; ?></td>
      </tr>
      <tr valign="top">
        <td colspan="2"><?php echo $entries[1]; ?></td>
      </tr>
    </table>
    <?php endif; ?>
  </div>
  <?php endforeach; ?>
  <?php
  break;
}