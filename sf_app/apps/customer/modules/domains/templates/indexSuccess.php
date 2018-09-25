<h1>Domains pointing to "<?php echo $sf_user -> getCurrentWebsite(); ?>"</h1>

<?php include_partial("global/flashes"); ?>

<div id="sidebar">
  <div class="note messagebox">
    <p>You may ask yourself what benefit could be derived from pointing an additional domain to my website? 
      Simply stated, it comes down to appearance.</p>
      <p>Lets assume you have a website for your office and it has a conventional name
      (i.e. johnsmithlaw.com <http://johnsmithlaw.com>).
      However, you have registered other domains that may not be as conventional or professional sounding
      (i.e. newyorkinjurylawyer.com <http://newyorkinjurylawyer.com>).
        Newyorkinjurylawyer.com is an easy domain to remember.</p>
      <p>If you advertise that domain in print, radio or television adds,
        it is an easier domain to recall if someone has a need for your services. </p>
  </div>
</div>

<div id="main_area">

  <?php if(!count($domains)): ?>
    <p>You currently have no domains associated with this website.</p>
  <?php else: ?>
  <table class="sf_admin_list" width="100%">
    <tr>
      <th>Domains</th>
      <th>Registed By</th>
      <th colspan="2">Actions</th>
    </tr>
    <?php foreach($domains as $domain): ?>
    <tr>
      <td><?php echo $domain; ?></td>
      <td><?php echo $domain -> getRegistrationTypeString(); ?></td>
      <?php if($domain -> getRegistrationType() == Domain::REGISTRATION_TYPE_ESQ): ?>
      <td width="32" colspan="2">-</td>
      <?php else: ?>
      <td width="16"><?php echo link_to(image_tag("pencil"), "domain_edit", $domain, "title=Edit This Domain"); ?></td>
      <td width="16"><?php echo link_to(image_tag("delete"), "domain_delete", $domain, "title=Remove This Domain method=delete confirm=Are you sure?"); ?></td>
      <?php endif; ?>
    </tr>
    <?php endforeach; ?>
  </table>
  <?php endif; ?>

  <ul class="sf_admin_actions">
    <li class="sf_admin_action_new"><?php echo link_to("Add Another Domain", "domain_new"); ?></li>
  </ul>

</div>