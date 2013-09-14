</div>
</div>

<footer role="contentinfo">
  <div id="inner-footer" class="clearfix">
    <div class="bottom-left-corner"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/library/images/corner-lt.png" alt="corner" /></div>
    <div class="bottom-right-corner"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/library/images/corner-rt.png" alt="corner" /></div>
    <div id="footer-wrap">
      <div class="row-fluid">
        <div class="span4">
          <nav class="row-fluid clearfix">
            <div class="span6"><?php hla_footer_links(); // Adjust using Menus in Wordpress Admin ?></div>
            <div class="span6"><?php hla_utility_links(); // Adjust using Menus in Wordpress Admin ?></div>
          </nav>
        </div>
        <div class="span4">
          <p class="attribution"><strong>
            <?php bloginfo('name'); ?>
            </strong><br />
            1340 East 29th Street<br />
            Brooklyn NY 11210<br />
            <strong>P: </strong>718.377.7200<br />
            <strong>F</strong>: 718.377.7220<br />
            <a href="mailto:info@hlacharterschools.org">info@hlacharterschools.org</a> </p>
        </div>
        <div class="span4"><small class="pull-right">&copy;
          <?php the_time('Y');?>
          <?php bloginfo('name'); ?>
          </small> </div>
      </div>
    </div>
  </div>
  <!-- end #inner-footer --> 
  
</footer>
<!-- end footer -->

</div>
<!-- end #container -->
</div>
<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->

<?php wp_footer(); // js scripts are inserted using this function ?>
</body></html>