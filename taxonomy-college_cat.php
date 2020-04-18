<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sparkling
 */

get_header('post'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php $id = get_queried_object()->taxonomy.'_'.get_queried_object()->term_id; ?>
			<div class="inner-banner common-overlay" style="background-image: url(<?php echo get_field('category_image', $id); ?>);">
			    <div class="container">
			        <div class="banner-content">
			        	<h1><?php echo get_queried_object()->name; ?></h1>
			        	<?php
		        	        $args = array(
		        	            'post_type' => 'college-programs',
		        	            'posts_per_page' => -1,
		        	            'tax_query' => array(
		        	                array(
		        	                    'taxonomy' => 'college_cat',
		        	                    'field' => 'slug',
		        	                    'terms' => get_queried_object()->slug
		        	                )
		        	            )
		        	        );
			        	    $loop = new WP_Query($args);
			        	    if( $loop->have_posts() ){
			        	    	?>
						        <ul class="list-inline banner-tabs colleges">
			        				<?php while( $loop->have_posts() ): $loop->the_post(); ?>
						                <li>    
						                    <div class="tab">
												<div class="tab-info">
						                        	<h5><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
													<a href="<?php echo get_the_permalink(); ?>" class="view-more"><?php _e('View More', 'jumeira'); ?></a>
												</div>
						                    </div>
						                </li>
		            				<?php endwhile; wp_reset_postdata(); ?>
								</ul>
		            			<?php 
		                    }
		            	?>
			        </div>
			    </div>
			</div>
			<div class="common-spacing">
				<div class="container">
					<?php echo wpautop( get_queried_object()->description ) ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
