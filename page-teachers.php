<?php 
//
// Template Name: Teachers Page
//
get_header(); ?>
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
        <?php the_content(); ?>
      </section>
      <!-- end article section -->
      
      <footer>
        <div class="row-fluid">
        	<?
            $grades = get_terms('grades');
			echo '<h4>By Grade Level</h4>';
			echo '<ul class="inline unstyled">';
		  	foreach ( $grades as $grade ) {
				echo '<li>';
				echo '<a href="#'.$grade->slug.'">';
				echo $grade->name;
				echo '</a>';
				echo '</li>';
			};
			echo '</ul>';
			?>
        </div>
        <div class="mar-one-t section" id="directory">
          <?php 
		  $i = 0;
		  $grades = get_terms('grades');
		  
		  foreach ( $grades as $grade ) {
			
			echo '<h2 class="clearfix" id="'.$grade->slug.'">';
			echo $grade->name;
			echo '</h2>';
			if ($grade->description):
			echo '<p>';
			echo $grade->description;
			echo '</p>';
			endif;			
			$query = new WP_Query( 
			$args = array(
				'post_type' => 'teachers',
				'posts_per_page' => '-1',
				'grades' => $grade->slug,
				'order' => 'ASC',
				'orderby'       =>  'term_order',
                'hide_empty'    => false
			) );					
			while ( $query->have_posts() ) : $query->the_post();
					get_template_part('column', 'teacher');				
			endwhile;
			wp_reset_postdata();
			$query = null;
			}
		
		?>
        </div>
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
  
  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
