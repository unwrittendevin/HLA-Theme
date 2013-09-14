<?php



// Homepage Options Dashboard Menu
//$file_url = get_bloginfo('template_directory').'/library/images/custom-post-icon.png';
function home_page_menu() {
  add_menu_page( 'Site Options', 'Site Options', 'edit_posts', 'home-menu', null, '', 32 );
}

add_action('admin_menu', 'home_page_menu');

// Custom Post Types
add_action( 'init', 'create_new_slides' );
function create_new_slides() {
	// Add Student Types
	$labels = array(
		'name' => 'Slides',
		 'singular_name' => 'Slide',
		 'menu_name' => 'Slides',
		 'add_new' => 'Add Slide',
		 'add_new_item' => 'Add New Slide',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Slide',
		 'new_item' => 'New Slide',
		 'view' => 'View Slide',
		 'view_item' => 'View Slide',
		 'search_items' => 'Search Slides',
		 'not_found' => 'No Slides Found',
		 'not_found_in_trash' => 'No Slides Found in Trash',
		 'parent' => 'Parent Slide'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new slides for HLA. These are displayed on the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'slide'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 1,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('slide', $args);
};
function set_slide_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title'),
        'date' => __('Date'),
        'author' => __('Author'),
		'column_1' => __('Slide Image'),
        'column_2' => __('Slide URL'),
    );
}
// POPULATE CUSTOM COLUMNS ON CUSTOM POST
add_action('manage_slide_posts_custom_column', 'add_new_slide_cols', 10, 2);
	function add_new_slide_cols($column, $post_id){
	global $post;
	switch ($column){
	case 'column_1':
	$column_1_content = the_field('slide_image');
	echo $column_1_content;
	case 'column_2':
	$column_2_content = the_field('slide_url');
	echo $column_2_content;
	default:
	break;
	}
}
add_filter('manage_slide_posts_columns' , 'set_slide_columns');
// New Modules For Site
add_action( 'init', 'create_new_modules' );
function create_new_modules() {
	// Add Modules
	$labels = array(
		'name' => 'Modules',
		 'singular_name' => 'Module',
		 'menu_name' => 'Modules',
		 'add_new' => 'Add Module',
		 'add_new_item' => 'Add New Module',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Module',
		 'new_item' => 'New Module',
		 'view' => 'View Module',
		 'view_item' => 'View Module',
		 'search_items' => 'Search Modules',
		 'not_found' => 'No Modules Found',
		 'not_found_in_trash' => 'No Modules Found in Trash',
		 'parent' => 'Parent Module'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new modules for HLA. These can be content blocks for the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'module'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 2,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'thumbnail'),
	);
	register_post_type('module', $args);
};

// New Modules For Site
add_action( 'init', 'create_new_actions' );
function create_new_actions() {
	// Add Modules
	$labels = array(
		'name' => 'HLA In Action',
		 'singular_name' => 'HLA In Action',
		 'menu_name' => 'HLA In Action',
		 'add_new' => 'Add HLA In Action Items',
		 'add_new_item' => 'Add New HLA In Action Item',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit HLA In Action Item',
		 'new_item' => 'New HLA In Action Item',
		 'view' => 'View HLA In Action Item',
		 'view_item' => 'View HLA In Action Item',
		 'search_items' => 'Search HLA In Action Items',
		 'not_found' => 'No HLA In Action Items Found',
		 'not_found_in_trash' => 'No HLA In Action Items Found in Trash',
		 'parent' => 'Parent HLA In Action Items'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new action items for HLA. These can be content blocks for the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'module'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 3,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('action-items', $args);
};

// FAQs
add_action( 'init', 'create_new_faq' );
function create_new_faq() {
	// Add Student Types
	$labels = array(
		'name' => 'FAQs',
		 'singular_name' => 'FAQ',
		 'menu_name' => 'FAQs',
		 'add_new' => 'Add FAQ',
		 'add_new_item' => 'Add New FAQ',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit FAQ',
		 'new_item' => 'New FAQ',
		 'view' => 'View FAQ',
		 'view_item' => 'View FAQ',
		 'search_items' => 'Search FAQs',
		 'not_found' => 'No FAQs Found',
		 'not_found_in_trash' => 'No FAQs Found in Trash',
		 'parent' => 'Parent FAQ'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new FAQ items for HLA.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'faq'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 34,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'editor'),
	);
	register_post_type('faq', $args);
};
// Register Custom Taxonomy
function faq_directory()  {
	$labels = array(
		'name'                       => _x( 'FAQ Sections', 'Taxonomy General Name', 'HLA' ),
		'singular_name'              => _x( 'FAQ Section', 'Taxonomy Singular Name', 'HLA' ),
		'menu_name'                  => __( 'FAQ Sections', 'HLA' ),
		'all_items'                  => __( 'All FAQ Sections', 'HLA' ),
		'parent_item'                => __( 'Parent FAQ Section', 'HLA' ),
		'parent_item_colon'          => __( 'Parent FAQ Section:', 'HLA' ),
		'new_item_name'              => __( 'New FAQ Section Name', 'HLA' ),
		'add_new_item'               => __( 'Add New FAQ Section', 'HLA' ),
		'edit_item'                  => __( 'Edit FAQ Section', 'HLA' ),
		'update_item'                => __( 'Update FAQ Section', 'HLA' ),
		'separate_items_with_commas' => __( 'Separate FAQ Sections with commas', 'HLA' ),
		'search_items'               => __( 'Search FAQ Sections', 'HLA' ),
		'add_or_remove_items'        => __( 'Add or remove FAQ Section', 'HLA' ),
		'choose_from_most_used'      => __( 'Choose from the most used FAQ Section', 'HLA' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'faq-sections', 'faq', $args );
}

// Hook into the 'init' action
add_action( 'init', 'faq_directory', 0 );

//
add_action( 'init', 'create_new_staff' );
function create_new_staff() {
	// Add Student Types
	$labels = array(
		'name' => 'Staff',
		 'singular_name' => 'Staff',
		 'menu_name' => 'School Leadership',
		 'add_new' => 'Add Staff',
		 'add_new_item' => 'Add New Staff Member',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Staff Member',
		 'new_item' => 'New Staff Member',
		 'view' => 'View Staff Member',
		 'view_item' => 'View Staff Member',
		 'search_items' => 'Search Staff Members',
		 'not_found' => 'No Staff Members Found',
		 'not_found_in_trash' => 'No Staff Members Found in Trash',
		 'parent' => 'Parent Staff'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new Staff Members for HLA.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'about-us/staff'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 35,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('staff', $args);
};

// Register Custom Taxonomy
function create_staff_roles()  {

	$labels = array(
		'name'                       => _x( 'Staff Roles', 'Taxonomy General Name', 'HLA' ),
		'singular_name'              => _x( 'Staff Role', 'Taxonomy Singular Name', 'HLA' ),
		'menu_name'                  => __( 'Staff Roles', 'HLA' ),
		'all_items'                  => __( 'All Staff Roles', 'HLA' ),
		'parent_item'                => __( 'Parent Staff Role', 'HLA' ),
		'parent_item_colon'          => __( 'Parent Staff Role:', 'HLA' ),
		'new_item_name'              => __( 'New Staff Role', 'HLA' ),
		'add_new_item'               => __( 'Add New Staff Role', 'HLA' ),
		'edit_item'                  => __( 'Edit Staff Role', 'HLA' ),
		'update_item'                => __( 'Update Staff Role', 'HLA' ),
		'separate_items_with_commas' => __( 'Separate staff roles with commas', 'HLA' ),
		'search_items'               => __( 'Search Staff Roles', 'HLA' ),
		'add_or_remove_items'        => __( 'Add or Remove Staff Role', 'HLA' ),
		'choose_from_most_used'      => __( 'Choose from the most used staff roles', 'HLA' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'roles', 'staff', $args );
}
// Hook into the 'init' action
add_action( 'init', 'create_staff_roles', 0 );

// Teachers
add_action( 'init', 'create_new_teachers' );
function create_new_teachers() {
	// Add Teacher Types
	$labels = array(
		'name' => 'Teachers',
		 'singular_name' => 'Teacher',
		 'menu_name' => 'Teachers',
		 'add_new' => 'Add Teacher',
		 'add_new_item' => 'Add New Teacher',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Teacher',
		 'new_item' => 'New Teacher',
		 'view' => 'View Teacher',
		 'view_item' => 'View Teacher',
		 'search_items' => 'Search Teachers',
		 'not_found' => 'No Teachers Found',
		 'not_found_in_trash' => 'No Teachers Found in Trash',
		 'parent' => 'Parent Teacher'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new Teachers for HLA.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'hla-teachers'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 36,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('teachers', $args);
};

// Register Custom Taxonomies for Teachers
function create_grade_levels()  {
	$labels = array(
		'name'                       => _x( 'Grade Levels', 'Taxonomy General Name', 'HLA' ),
		'singular_name'              => _x( 'Grade Level', 'Taxonomy Singular Name', 'HLA' ),
		'menu_name'                  => __( 'Grade Levels', 'HLA' ),
		'all_items'                  => __( 'All Grade Levels', 'HLA' ),
		'parent_item'                => __( 'Parent Grade Level', 'HLA' ),
		'parent_item_colon'          => __( 'Parent Grade Level:', 'HLA' ),
		'new_item_name'              => __( 'New Grade Level', 'HLA' ),
		'add_new_item'               => __( 'Add New Grade Level', 'HLA' ),
		'edit_item'                  => __( 'Edit Grade Level', 'HLA' ),
		'update_item'                => __( 'Update Grade Level', 'HLA' ),
		'separate_items_with_commas' => __( 'Separate Grade Levels with commas', 'HLA' ),
		'search_items'               => __( 'Search Grade Levels', 'HLA' ),
		'add_or_remove_items'        => __( 'Add or Remove Grade Levels', 'HLA' ),
		'choose_from_most_used'      => __( 'Choose from the most used Grade Levels', 'HLA' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'grades', 'teachers', $args );
}
add_action( 'init', 'create_grade_levels', 0 );

function create_teach_type()  {
	$labels = array(
		'name'                       => _x( 'Teaching Specialty', 'Taxonomy General Name', 'HLA' ),
		'singular_name'              => _x( 'Teaching Specialty', 'Taxonomy Singular Name', 'HLA' ),
		'menu_name'                  => __( 'Teaching Specialties', 'HLA' ),
		'all_items'                  => __( 'All Teaching Specialties', 'HLA' ),
		'parent_item'                => __( 'Parent Teaching Specialty', 'HLA' ),
		'parent_item_colon'          => __( 'Parent Teaching Specialty:', 'HLA' ),
		'new_item_name'              => __( 'New Teaching Specialty', 'HLA' ),
		'add_new_item'               => __( 'Add New Teaching Specialty', 'HLA' ),
		'edit_item'                  => __( 'Edit Teaching Specialty', 'HLA' ),
		'update_item'                => __( 'Update Teaching Specialty', 'HLA' ),
		'separate_items_with_commas' => __( 'Separate Teaching Specialties with commas', 'HLA' ),
		'search_items'               => __( 'Search Teaching Specialties', 'HLA' ),
		'add_or_remove_items'        => __( 'Add or Remove Teaching Specialties', 'HLA' ),
		'choose_from_most_used'      => __( 'Choose from the most used Teaching Specialties', 'HLA' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'specialty', 'teachers', $args );
}
add_action( 'init', 'create_teach_type', 0 );
//Media Gallery Custom Tax
// Register Custom Taxonomy
function media_directory()  {
	$labels = array(
		'name'                       => _x( 'Media Types', 'Taxonomy General Name', 'HLA' ),
		'singular_name'              => _x( 'Media Type', 'Taxonomy Singular Name', 'HLA' ),
		'menu_name'                  => __( 'Media Types', 'HLA' ),
		'all_items'                  => __( 'All Media Types', 'HLA' ),
		'parent_item'                => __( 'Parent Media Type', 'HLA' ),
		'parent_item_colon'          => __( 'Parent Media Type:', 'HLA' ),
		'new_item_name'              => __( 'New Media Type Name', 'HLA' ),
		'add_new_item'               => __( 'Add New Media Type', 'HLA' ),
		'edit_item'                  => __( 'Edit Media Type', 'HLA' ),
		'update_item'                => __( 'Update Media Type', 'HLA' ),
		'separate_items_with_commas' => __( 'Separate media types with commas', 'HLA' ),
		'search_items'               => __( 'Search Media Types', 'HLA' ),
		'add_or_remove_items'        => __( 'Add or remove media types', 'HLA' ),
		'choose_from_most_used'      => __( 'Choose from the most used media types', 'HLA' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'types', 'attachment', $args );
}

// Hook into the 'init' action
add_action( 'init', 'media_directory', 0 );
?>