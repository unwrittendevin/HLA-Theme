<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<div id="content" class="clearfix row-fluid">
  <div id="main" class="span8 clearfix" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <header>
        <div class="page-header">
          <div class="bottom-left-corner"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/library/images/corner-lb.png" alt="corner" /></div>
          <h1 class="page-title" itemprop="headline">
            <?php the_title(); ?>
          </h1>
        </div>
      </header>
      <!-- end article header -->
      
      <section class="post_content clearfix" itemprop="articleBody">
      <? if (has_post_thumbnail()){
		  echo '<div class="row-fluid"><div class="span6">';
		  the_content();
		  echo '</div><div class="span6 hidden-phone">';
		  the_post_thumbnail('featured-home');
		  echo '</div></div>';
	  } else {
		  the_content(); 
	  } ?>
      </section>
      <!-- end article section -->
      
      <footer>
        <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","hlatheme") . ':</span> ', ', ', '</p>'); ?>
      </footer>
      <!-- end article footer --> 
      
    </article>
    <!-- end article -->
    
    <?php endwhile; ?>
    <?php else : ?>
    <article id="post-not-found">
      <header>
        <h1>
          <?php _e("Not Found", "hlatheme"); ?>
        </h1>
      </header>
      <section class="post_content">
        <p>
          <?php _e("Sorry, but the requested resource was not found on this site.", "hlatheme"); ?>
        </p>
      </section>
      <footer> </footer>
    </article>
    <?php endif; ?>
  </div>
  <!-- end #main -->
  
  <?php get_sidebar('home'); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
