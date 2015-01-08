<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <div class="container">
	<div class="row">
		<div class="padding">
			<div class="col-md-8 col-md-push-4">
			  <?php the_content(); ?>
			</div>
			<div class="col-md-4 col-md-pull-8">
				<?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	the_post_thumbnail( 'full', array ('class' => 'img-responsive'));
} 
?>
			</div>
		</div>
	</div>
  </div>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
