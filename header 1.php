<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- media-queries.js (fallback) -->
<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

<!-- html5.js -->
<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<!-- wordpress head functions -->
<?php wp_head(); ?>
<!-- end of wordpress head -->

<!-- theme options from options panel -->

<!-- typeahead plugin - if top nav search bar enabled -->
<?php require_once('library/typeahead.php'); ?>
</head>

<body <?php body_class(); ?>>
<div class="container" id="wrapper">
<header role="banner" id="page-head">
  <div id="inner-header" class="row-fluid clearfix">
    <div class="span4" id="logo">
      <h1 class="brand pad-one-lr"><a title="<?php echo get_bloginfo('title'); ?>" href="<?php echo home_url(); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/library/images/HLA-logo.png" alt="<?php bloginfo( 'name' ); ?>" /> <span class="hidden">
        <?php bloginfo('name'); ?>
        </span></a></h1>
    </div>
    <div class="span8">
      <div class="row-fluid">
        <div class="pull-right mar-two-t mar-two-r" id="tagline"><a title="<?php echo get_bloginfo('title'); ?>" href="<?php echo home_url(); ?>"> <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/library/images/HLA-headline.png" alt="<?php bloginfo( 'description' ); ?>" /></a></div>
      </div>
      <div class="navbar row-fluid">
        <div class="navbar-inner">
          <div class="container nav-container">
            <nav role="navigation"> <a class="btn btn-navbar btn-block" data-toggle="collapse" data-target=".nav-collapse">MENU <div class="pull-right"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div> </a>
              <div class="nav-collapse collapse">
                <?php hla_main_nav(); // Adjust using Menus in Wordpress Admin ?>
              </div>
            </nav>
            <?php if(of_get_option('search_bar', '1')) {?>
            <form class="navbar-search pull-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
              <input name="s" id="s" type="text" class="search-query" autocomplete="off" placeholder="<?php _e('Search','hlatheme'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
            </form>
            <?php } ?>
          </div>
          <!-- end .nav-container --> 
        </div>
        <!-- end .navbar-inner --> 
      </div>
      <!-- end .navbar --> 
    </div>
  </div>
  <!-- end #inner-header -->
<div class="bottom-left-corner"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/library/images/corner-lb.png" alt="corner" /></div>   
<div class="bottom-right-corner"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/library/images/corner-rb.png" alt="corner" /></div>  
</header>
<!-- end header -->
<div class="constrainer"><?php if (is_front_page()){ ?>
  <div id="myCarousel" class="carousel">
  <ol class="carousel-indicators hidden-phone">
    <?php 
      $post_num = 0;
            $query = new WP_Query(array( 'post_type' => 'slide'));
      while ( $query->have_posts() ) : $query->the_post();
      
      echo  '<li data-target="#myCarousel" data-slide-to="'.$post_num.'" ';
       
      if($post_num == 0){ 
        echo 'class="active"';
      }
      echo '>*';
      
      $post_num++;
      echo '</li>';
      
      endwhile; ?>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <?php 
      $post_num = 0;
            $query = new WP_Query(array( 'post_type' => 'slide'));
      while ( $query->have_posts() ) : $query->the_post();
      $post_num++;
      // Image swaps?
      $attachment_id = get_field('slide_image');
      $size = "carousel";
      $image = wp_get_attachment_image_src( $attachment_id, $size );
            echo '<div class="item ';
      if($post_num == 1){ 
        echo 'active';
      }
      echo '"><img src="';
      echo $image[0];
      echo '" alt="';
      the_title();
      echo '" /><div class="carousel-caption">';
      echo '<h4>';
	  echo '<div class="bottom-left-corner"><img src="';
	  echo bloginfo( 'stylesheet_directory' );
	  echo '/library/images/corner-lb.png" alt="corner" /></div>';
      the_title();
      echo '</h4>';
	  echo get_field('slide_caption');
      echo '</div></div>';
      
      endwhile; ?>
  </div>
  <!-- Carousel nav --> 
  <!-- Carousel nav -->
  <div class="visible-phone"><a class="carousel-control left" href="#myCarousel" data-slide="prev"><i class="icon-chevron-left"></i></a> <a class="carousel-control right" href="#myCarousel" data-slide="next"><i class="icon-chevron-right pull-right"></i></a></div>
 </div>
<? } ?>
<div class="container-fluid" id="content-wrap">
