<?php /* Template Name: Tuition Fees */ ?>
<?php
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
				the_content();
				?>
				<div class="common-spacing">
					<?php
					if( have_rows('tuition') ):
						?>
						<ul class="nav nav-tabs main-text-tab">
							<?php
							$i = 0;
						 	while ( have_rows('tuition') ) : the_row();
						 		?>
						    	<li class="<?php if($i == 0){ echo 'active'; }else{ echo ''; } ?>">
						    		<a data-toggle="tab" href="#<?php echo 'active_tut_'.$i; ?>"><?php echo get_sub_field('title'); ?></a>
						    	</li>
						    	<?php
						    	$i++;
						    endwhile;
						    ?>
						</ul>
					    <?php
					endif;
					?>
					<div class="tab-content">
						<?php
						if( have_rows('tuition') ):
							$j = 0;
						    while ( have_rows('tuition') ) : the_row();
				    	    	?>
				    			<div id="<?php echo 'active_tut_'.$j; ?>" class="tab-pane fade <?php if($j == 0){ echo 'in active'; }else{ echo ''; } ?>">
				    			    <h3 class="vc_custom_heading"><?php echo get_sub_field('full_title'); ?></h3>
				    			   	<?php
				    			   	if( have_rows('tuition_types') ):
				    			   		?>
				    			   		<ul class="nav nav-tabs inner-tab <?php if($j == 1){ echo 'fees-tab'; } ?>">
				    			   		    <?php
				    			   		    $k = 0;
					    			   	    while ( have_rows('tuition_types') ) : the_row();
					    			   	    	?>
				    			   		    	<li class="<?php if($k == 0){ echo 'active'; }else{ echo ''; } ?>">
				    			   		    		<a data-toggle="tab" href="#<?php echo 'active_'.$j.$k; ?>"><?php echo get_sub_field('tuition_type_title'); if(get_sub_field('tuition_sub_title')){ ?><span><?php echo get_sub_field('tuition_sub_title'); ?></span><?php } ?></a>
				    			   		    	</li>
					    			   	    	<?php
						    			   	    $k++;
					    			   	    endwhile;
					    			   	    ?>
				    			   		</ul>
				    			   	    <?php
				    			   	endif;
				    			   	?>
				    			   	<div class="tab-content">
				    			   		<?php
				    			   		if( have_rows('tuition_types') ):
						    			   	$l = 0;
				    			   			while ( have_rows('tuition_types') ) : the_row();
				    			   		    	?>
				    			   	    		<div id="<?php echo 'active_'.$j.$l; ?>" class="tab-pane fade <?php if($l == 0){ echo 'in active'; }else{ echo ''; } ?>">
						    			   	        <h5 class="vc_custom_heading"><?php echo get_sub_field('tab_full_title'); ?></h5>
						    			   	        <?php echo get_sub_field('tab_content'); ?>
						    			   	    </div>
				    			   		    	<?php
				    			   		    	$l++;
				    			   	  		endwhile;
					    			   	endif;
				    			   		?>
				    			   	</div>
				    			</div>
				    			<?php
				    			$j++;
						    endwhile;
						endif;
						?>
					</div>
				</div>
				<?php
			endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
