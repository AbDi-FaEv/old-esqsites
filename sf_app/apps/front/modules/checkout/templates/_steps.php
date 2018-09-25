<div id="checkout_steps" class="span-24 last">
  <ul>
    <?php foreach($steps as $key => $step): ?>
        <li class="<?php echo "step".$key; ?> <?php if($step -> isCurrent()) echo "current"; ?> <?php if($step -> isCompleted()) echo "ok"; ?>">
          <?php echo link_to($key.". ".$step, $step -> getRoute(), array("target" => "_top"));  ?>
        </li>
    <?php endforeach; ?>
  </ul>
</div>