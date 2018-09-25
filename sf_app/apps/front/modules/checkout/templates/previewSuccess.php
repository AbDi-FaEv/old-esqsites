<?php decorate_with("frames"); ?>

<frameset rows="230,*" cols="*">
  <frame FRAMEBORDER=yes FRAMESPACING=0 BORDER=1 noresize scrolling="no" src="<?php echo url_for("preview_top"); ?>" />
  <frame name="window" FRAMEBORDER=NO FRAMESPACING=0 BORDER=0 noresize src="/preview" />
</frameset>
<noframes></noframes>