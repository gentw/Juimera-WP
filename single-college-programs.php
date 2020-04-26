<?php
/**
 * The Template for displaying all single posts.
 *
 * @package sparkling
 */

get_header('post'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php $page_id = get_the_ID(); $terms = get_the_terms( get_the_ID(), 'college_cat' );
			$id = $terms[0]->taxonomy.'_'.$terms[0]->term_id; ?>
			<div class="inner-banner common-overlay" style="background-image: url(<?php echo get_field('category_image', $id); ?>);">
			    <div class="container">
			        <div class="banner-content">
			        	<h1><?php echo get_field('custom_title_long_text', get_the_ID()); ?></h1>
			        	
			        </div>
			    </div>
			</div>

			<div style="background-color: #E7DFC9; width: 100%; height: auto; position:relative">
				<div class="container">
					<?php
		        	        $args = array(
		        	            'post_type' => 'college-programs',
		        	            'posts_per_page' => -1,
		        	            'tax_query' => array(
		        	                array(
		        	                    'taxonomy' => 'college_cat',
		        	                    'field' => 'slug',
		        	                    'terms' => $terms[0]->slug
		        	                )
		        	            )
		        	        );
			        	    $loop = new WP_Query($args);
			        	    if( $loop->have_posts() ){
			        	    	?>
						        <ul class="list-inline banner-tabs colleges">
			        				<?php while( $loop->have_posts() ): $loop->the_post();
			        					$active_class = ''; 
			        					if(get_the_ID() == $page_id){
			        						$active_class = 'active';
			        					}
			        					?>
						                <li class="<?php echo $active_class; ?>">    
						                    <div class="tab">
												<div class="tab-info">
													<h5><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
													<a href="<?php echo get_the_permalink(); ?>" class="view-more"><?php echo _e('View More', 'jumeira'); ?></a>
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

			<div class="common-spacing">
				<div class="container">
					<?php the_content(); ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
