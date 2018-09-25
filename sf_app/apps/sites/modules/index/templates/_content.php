<?php switch($page -> getPageContentDisplayTypeId()):
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  case Page::DISPLAY_TYPE_BLANK: //clean page
    echo $page -> getContent(ESC_RAW);
  break;
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  case Page::DISPLAY_TYPE_LINKS: //links
    foreach($page -> getLinks() as $link): ?>
        <b><a href="<?php echo $link -> url; ?>"><?php echo $link -> title; ?></a></b><br />
        <?php echo $link -> description; ?><br /><br />
    <?php endforeach;
  break;
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  case Page::DISPLAY_TYPE_CASE_SUBMIT: //case submit form
    ?>
    <?php if($message = $page -> getMessage(ESC_RAW)): ?>
      <?php echo $message; ?><br /><br />
    <?php endif; ?>

    <?php $form = $page -> getForm("case_submission"); ?>
    <?php if($form -> isBound() && $form -> isValid()): ?>
      <p><?php echo $page -> getFormMessage("case_submission", "Thank you, your email message has been sent."); ?></p>
    <?php else: ?>
      <?php //this needs to be smarter when better routing is available ?>
      <link rel="stylesheet" type="text/css" media="screen" href="templates/base/css/forms.css" />
      <?php echo $form -> renderGlobalErrors(); ?>
      <?php echo $form -> renderFormTag($_SERVER["REQUEST_URI"]); //this is just a quick fix until proper routing is setup ?>
        <?php echo $form -> renderHiddenFields(); ?>
        <ul class="form">
          <?php echo $form; ?>
        </ul>
        <input type="submit" value="Submit" />
      </form>

    <?php endif; ?>
  <?php
  break;
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  case Page::DISPLAY_TYPE_PAYMENT: //payment page
    ?>
      <?php if($message = $page -> getContent(ESC_RAW)): ?>
        <?php echo $message; ?><br />
      <?php endif; ?>

        <div id="esq_payment_form">
          <form action="https://pay1.plugnpay.com/payment/pay.cgi " method="POST">
            <input name="publisher-name" value="<?php echo $page -> getAccountId(); ?>" type="hidden">
            <p>
                <strong>Payment amount:</strong><br />
                in U.S. dollars<br />
                <input name="card-amount" value="" size="20" type="text">
                <span class="help">No dollar sign.</span><br />
                <em>Example: 64.50</em>
            </p>
            
            <div id="esq_payment_submit"><input name="submit" value="Next &raquo;" type="submit"></div>

            <hr />
            <p>Paying your bill online is quick, easy & secure.<br />We accept some or all of the following credit cards:</p>
            <img src="templates/base/images/cards.png" />
            
          </form>
        </div>
    <?php
  break;
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  case Page::DISPLAY_TYPE_MAP: //map
  ?>
    <?php echo $page -> getMessage(ESC_RAW); //message ?>
    <br /><br />
    <?php if($address_link = $page -> getGeoLocatableAddress()): ?>
      <a href="http://maps.google.com/maps?daddr=<?php echo $address_link; ?>" target="_blank">
        <?php echo $page -> getDescription(); //description ?>
      </a><br /><br />
      <b>Get driving directions</b>:<br /><br />
      <form target="_blank" action="http://maps.google.com/maps" method="get">
        <p><label for="saddr">Enter a start address: </label><br />
        i.e. "202 C St, San Diego, CA 92101"<br />
        <input type="text" size="60" name="saddr" id="saddr" value="" />
        <input type="submit" value="Go" />
        <input type="hidden" name="daddr" value="<?php echo $address_link; ?>" />
        <input type="hidden" name="hl" value="en" /></p>
      </form>
      <p>Destination address: <strong><?php echo $address_link; ?></strong></p>
    <?php endif; ?>
  <?php
  break;
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  case Page::DISPLAY_TYPE_GROUPED_WITH_LINKS:
  ?>
  <?php foreach($page -> getEntries() as $key => $entry): ?>
    <a href="#entry_<?php echo $key; ?>"><?php echo $entry -> title; ?></a><br />
  <?php endforeach; ?>
    <br /><br />
  <?php //no break - keep on going
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  case Page::DISPLAY_TYPE_GROUPED: //grouped entries (w/ or /wout links)
  ?>
  <?php foreach($page -> getEntries() as $key => $entry): ?>
    <a name="entry_<?php echo $key; ?>"></a><b><?php echo $entry -> title; ?></b><br />
    <?php echo $entry -> description; ?><br /><br />
  <?php endforeach; ?>
  <?php
  break;
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  case Page::DISPLAY_TYPE_SITEMAP:
  ?>
    <ul>
    <?php foreach($page -> getWebsite() -> getActivePagesByMenuType(1) as $page): ?>
      <li><a href="<?php echo $page -> getUrl(); ?>" title="<?php echo $page -> getTitle(); ?>"><?php echo $page -> getLinkName(); ?></a></li>
    <?php endforeach; ?>
    </ul>
  <?php
  break;
  default:
    throw new RuntimeException("Unknown content display type: ".$page -> getPageContentDisplayTypeId());
  break;
endswitch;