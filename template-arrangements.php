<?php
/*
Template Name: Arrangements Page Template
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>

  <?php //Set Exhibitions & Programs Query Parameters
				$arrangements_query = new WP_Query(array(
					'post_type' => 'arrangement',
					'orderby' => 'date',
					'order' => 'DESC',
					'posts_per_page' => '-1'
					));
					 ?>

	<?php while ($arrangements_query->have_posts()) : $arrangements_query->the_post();  ?>
	<div class="panel panel-default">
<div class="panel-body">
	<h3>
<?php if (get_post_meta($post->ID, 'ecpt_arrangement_title', true)) : ?>
<?php echo get_post_meta($post->ID, 'ecpt_arrangement_title', true); ?>
	<?php endif; ?>
<?php if (get_post_meta($post->ID, 'ecpt_arrangement_subtitle', true)) : ?>
		<br><small><?php echo get_post_meta($post->ID, 'ecpt_arrangement_subtitle', true); ?></small>
	<?php endif; ?></h3>
	<p><?php if (get_post_meta($post->ID, 'ecpt_instrumentation', true)) : ?>
		<?php echo get_post_meta($post->ID, 'ecpt_instrumentation', true); ?>
	<?php endif; ?></p>
		<p><?php if (get_post_meta($post->ID, 'ecpt_length', true)) : ?>
		<?php echo get_post_meta($post->ID, 'ecpt_length', true); ?>
	<?php endif; ?></p>
<p><?php if (get_post_meta($post->ID, 'ecpt_description', true)) : ?>
		<?php echo get_post_meta($post->ID, 'ecpt_description', true); ?>
	<?php endif; ?></p>
					
						</div>
						</div>		
						<?php endwhile; ?>		

<?php endwhile; ?>
