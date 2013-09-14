<?php 
//
// Template Name: Publication Page
//
get_header(); ?>

<div id="content-wrap">
  <div id="content" class="clearfix row-fluid">
    <div id="main" class="span8 clearfix pull-right" role="main">
      <?php while (have_posts()) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class('clearfix article'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="header">
          <div class="page-header">
            <h1 class="page-title" itemprop="headline">
              <?php the_title(); ?>
            </h1>
          </div>
        </div>
        <!-- end article header --> 
        <!-- end article section -->
        <div class="mar-one-t section" id="directory">
          <?php 
		  $i = 0;
		  $pdf_files = get_terms('document');
		  
		  foreach ( $pdf_files as $pdf_file ) {
			
			echo '<h2 class="clearfix" id="'.$staff_role->slug.'">';
			echo $pdf_file->name;
			echo '</h2>';
			if ($pdf_file->description):
			echo '<p>';
			echo $pdf_file->description;
			echo '</p>';
			
			endif;
			
			$years = get_terms('pub_year', $args = array(
	    		//'orderby'       => 'term_order', 
    			'order'         => 'DESC',
    			'hide_empty'    => true, 
    				)
			);
			
			foreach ( $years as $year ) {
			$query = new WP_Query( 
			$args = array(
				'posts_per_page' => '-1',
				'document' => $pdf_file->slug,
				'pub_year' => $year->slug,
				'order' => 'ASC',
			) );
			
			$myCount = (int)$query->post_count;
			if ($myCount > 0){
				echo '<h3 class="clearfix" id="'.$year->slug.'">';
				echo $year->name;
				echo '</h3>';
				echo '<div class="row-fluid pad-one-b clearfix"><ul class="pub-list">';
			}
						
			while ( $query->have_posts() ) : $query->the_post();
					get_template_part('column', 'pubs');				
			endwhile;
			if ($myCount > 0){
				echo '</ul></div>';
			}
			wp_reset_postdata();
			$query = null;
			}
		}
		?>
        </div>
        <!-- end article footer --> 
        
      </div>
      <!-- end article -->
      
      <?php endwhile; ?>
    </div>
    <!-- end #main -->
    
    <?php get_sidebar(); // sidebar 1 ?>
  </div>
  <!-- end #content --> 
</div>
<?php get_footer(); ?>
