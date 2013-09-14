<?php
echo '<div class="row-fluid">';
echo '<h3>'. get_the_title() .'</h3>';
echo '<em>';
$specialties =  get_the_terms($post->ID, 'specialty');
foreach ( $specialties as $specialty ) {
	echo $specialty->name;
}
echo '</em>';

if (get_field('teacher_photo')) {
	$pdf_cover = get_field('teacher_photo');
	$pdf_size = "bio";
	$pdf_image = wp_get_attachment_image_src( $pdf_cover, $pdf_size );
	echo '<div class="span4 pull-right pad-one"><div class="thumbnail"><img src="';
	echo $pdf_image[0];
	echo '" alt="';
	echo get_the_title();
	echo '"/></div></div>';	
} else {
	echo '<div class="span4 pull-right pad-one"><div class="thumbnail">';
	echo '<img src="';
	bloginfo( 'stylesheet_directory' );
	echo '/library/images/HLA-logo.png" alt="';
	bloginfo('name');
	echo '">';
	echo '</div></div>';
}
if (get_field('question1')) {
	echo '<h4>';
	echo 'I became a teacher because...';
	echo '</h4>';
	echo get_field('question1');
}
if (get_field('question2')) {
	echo '<h4>';
	echo 'My favorite memory from teaching and learning...';
	echo '</h4>';
	echo get_field('question2');
}
if (get_field('question3')) {
	echo '<h4>';
	echo 'I joined HLA because...';
	echo '</h4>';
	echo get_field('question3');
}
if (get_field('question4')) {
	echo '<h4>';
	echo 'My vision for our children at HLA...';
	echo '</h4>';
	echo get_field('question4');
}
echo '</div>';
?>