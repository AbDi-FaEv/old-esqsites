<div id="sf_admin_container">
<div id="sf_admin_content">

<h1>Domain Status Monitor (<?php echo count($domains); ?> domains)</h1>

<table id="domain_status">
  <tr>
    <th>Domain</th>
    <th>Created</th>
    <th>Reponse Code</th>
    <th>Hosted</th>
    <th>Last Check</th>
  </tr>
<?php foreach($domains as $domain): ?>
  <?php $check = $domain -> getLastDomainCheck(); ?>
<tr class="<?php echo ($check && ($check -> getStatusCode() == 200)) ? "good" : "bad"; ?>">
  <td><a href="http://<?php echo $domain; ?>" target="_blank"><?php echo $domain; ?></a></td>
  <td><?php echo $domain -> getCreatedAt("m/d/y"); ?></td>
  <td><?php echo $check ? $check -> getStatusCode() : "-"; ?></td>
  <td><?php echo $check ? $check -> getHost() : "-"; ?></td>
  <td><?php echo $check ? time_ago_in_words($check -> getCreatedAt('U'))." ago" : "-"; ?></td>
</tr>
<?php endforeach; ?>
</table>

<style>
  #domain_status .good  {background-color:#d9efd6;}
  #domain_status .bad  {background-color:#ffc0c0;}
</style>

</div>
</div>