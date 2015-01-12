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
					'orderby' => 'ID',
					'order' => 'DESC',
					'posts_per_page' => '-1'
					));
					 ?>
<div class="padding">
	<div id="fields_search" role="search">
					<form action="#">
						<fieldset> 
							<?php $arrangements = get_terms('arrangement_type', array(
								'orderby' 		=> 'ID',
								'order'			=> 'ASC',
								'hide_empty'	=> true,
								));
							
							$count_arrangements = count($arrangements);
							if ($count_arrangements > 0) { ?>
							<div class="row">
								<h3>Filter by Arrangement Type:</h3>
							</div>
							
							<ul class="list-inline filter option-set" data-filter-group="arrangement_type">
								<a href="#" data-filter="" class="btn btn-default selected">View All</a>
								<?php foreach ( $arrangements as $arrangement ) { ?>
									<a href="#" class="btn btn-default" data-filter=".<?php echo $arrangement->slug; ?>"><?php echo $arrangement->name; ?></a>
								<?php } ?>
							</ul>
						<?php } ?>
						<div class="row">
							<h4>Search by keyword:</h4>		
							<input type="submit" class="icon-search" placeholder="Search by name/keyword" value="&#xe004;" />
							<input type="text" name="search" value="" id="id_search" aria-label="Search"  /> 
						</div>
						</fieldset>
					</form>
	</div>

	<div id="arrangements">
		<?php while ($arrangements_query->have_posts()) : $arrangements_query->the_post();  ?>

	<?php //Pull discipline array (humanities, natural, social)
			$program_types = get_the_terms( $post->ID, 'arrangement_type' );
				if ( $program_types && ! is_wp_error( $program_types ) ) : 
					$program_type_names = array();
					$degree_types = array();
						foreach ( $program_types as $program_type ) {
							$program_type_names[] = $program_type->slug;
							$arrangement_types[] = $program_type->name;
						}
					$program_type_name = join( " ", $program_type_names );
					$arrangement_type = join( ", ", $arrangement_types );
				endif; ?>
			
			<!-- Set classes for isotype.js filter buttons -->


			<div class="arrangement panel panel-default <?php echo $program_type_name ?>">
				<div class="panel-body">
					<h3>
					<?php if (get_post_meta($post->ID, 'ecpt_arrangement_title', true)) : ?>
						<?php echo get_post_meta($post->ID, 'ecpt_arrangement_title', true); ?>
					<?php endif; ?>
					<?php if (get_post_meta($post->ID, 'ecpt_arrangement_subtitle', true)) : ?>
						<br><small><?php echo get_post_meta($post->ID, 'ecpt_arrangement_subtitle', true); ?></small>
					<?php endif; ?></h3>
					<?php if (get_post_meta($post->ID, 'ecpt_instrumentation', true)) : ?>
						<p><?php echo get_post_meta($post->ID, 'ecpt_instrumentation', true); ?></p>
					<?php endif; ?>
					<?php if (get_post_meta($post->ID, 'ecpt_length', true)) : ?>
						<p><?php echo get_post_meta($post->ID, 'ecpt_length', true); ?></p>
					<?php endif; ?>
					<?php if (get_post_meta($post->ID, 'ecpt_description', true)) : ?>
						<p><?php echo get_post_meta($post->ID, 'ecpt_description', true); ?></p>
					<?php endif; ?>	
					<?php the_content();?>				
				</div>
			</div>		
		<?php endwhile; ?>		
	</div>
</div>
<?php endwhile; ?>
