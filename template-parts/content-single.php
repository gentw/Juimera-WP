<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-inner-content">
		<div class="entry-content">
			<div class="container">
				<div class="news-inner-banner"></div>
				<h4><?php echo get_the_title(); ?></h4>
				<?php the_content(); ?>
			</div>
			<div class="other-news common-spacing">
				<div class="container">
					<?php
					$category = get_the_category();
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => -1,
						'post__not_in' => array(get_the_ID()),
						'category__in' => array($category[0]->term_id),
					);
					$loop = new WP_Query($args);
					if( $loop->have_posts() ):
						?>
						<h3>Other News</h3>
						<ul>
							<?php while( $loop->have_posts() ): $loop->the_post(); 
								$id = get_the_ID();
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
								?>
								<li>
									<div class="news-img" style="background-image: url(<?php echo $image[0]; ?>)"></div>
									<div class="news-content">
										<h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
										<p><?php echo get_the_excerpt(); ?></p>
										<a href="<?php echo get_the_permalink(); ?>" class="read-more">Read More</a>
									</div>
								</li>
							<?php endwhile; wp_reset_postdata(); ?>
						</ul>
						<?php
					endif;
					?>
				</div>
			</div>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->