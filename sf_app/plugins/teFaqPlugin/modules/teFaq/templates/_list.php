<script type="text/javascript">
jQuery(document).ready(function(){	
	$('#te_faqs .question').addClass("opened").click(function() {
		$(this).next().slideToggle();
		$(this).toggleClass("opened").toggleClass("closed");
		return false;
	}).next().hide();
});
</script>

<div id="te_faqs">
<?php foreach($faqs as $faq): ?>
  <div class="faq <?php echo $faqs -> isEven() ? 'even' : 'odd'; ?>">
    <div class="question"><a href="#"><?php echo $faq -> getQuestion(); ?></a></div>
    <div class="answer"><?php echo $faq -> getAnswer(); ?></div>
  </div>
<?php endforeach; ?>
</div>