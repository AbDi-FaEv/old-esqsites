<div class="header">Domains: (<?php echo $website -> countDomains(); ?>)</div>
<?php foreach($websites = $website -> getDomains() as $domain): ?>
<div class="sf_admin_row">
<ul>
  <li>
    <?php if((count($websites) > 1) && ($domain -> getId() == $website -> getPrimaryDomainId())): ?>
      <?php echo image_tag("award_star_gold_3", "title=Primary Domain") ?>
    <?php endif; ?>
    <?php echo link_to("www.".$domain -> getName(), "http://www.".$domain -> getName(), array("target" => "_blank")); ?>
    <span class="note">(<?php echo $domain -> getRegistrationTypeString(); ?>)</span>
    <?php echo link_to(image_tag("pencil"), "domain_edit", $domain); ?>
    <?php if($domain -> getRegistrationType() == Domain::REGISTRATION_TYPE_ESQ): ?>
    <br />
    Expires: <?php echo $domain -> getExpirationDate("m/d/Y"); ?><br />
    Last Renewed: <?php echo $domain -> getLastRenewalDate("m/d/Y"); ?>
    <?php endif; ?>
    <br />
    <a href="http://whois.domaintools.com/<?php echo $domain -> getName(); ?>" target="whois">WHOIS Record</a>
  </li>
</ul>
</div>

<?php endforeach; ?>