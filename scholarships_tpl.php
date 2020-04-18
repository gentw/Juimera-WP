<?php /* Template Name: Scholarship */ ?>
<?php
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
				the_content();
				?>
				<div class="common-spacing">
					<h3><?php echo esc_html_e( 'Scholarships', 'jumeira' ); ?></h3>
				    <div class="scholarship-tab">
						<?php
						if( have_rows('scholarships_type') ):
							$i = 0;
							?>
				    	    <ul class="nav nav-tabs inner-tab">
								<?php
							    while ( have_rows('scholarships_type') ) : the_row();
					    			?>
					    	        <li class="<?php if($i == 0){ echo 'active'; }else{ echo ''; } ?>"><a data-toggle="tab" href="#<?php echo str_replace(' ', '_',  get_sub_field('scholarship_title')); ?>"><?php echo get_sub_field('scholarship_title'); ?></a></li>
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
							if( have_rows('scholarships_type') ):
								$j = 0;
								while ( have_rows('scholarships_type') ) : the_row();
									?>
								    <div id="<?php echo str_replace(' ', '_',  get_sub_field('scholarship_title')); ?>" class="tab-pane fade <?php if($j == 0){ echo 'in active'; }else{ echo ''; } ?>">
								        <div class="row">
								            <div class="col-sm-5">
								                <div class="sc-content">
								                    <h4><?php echo get_sub_field('scholarship_requirement_title'); ?></h4>
								                    <?php echo get_sub_field('scholarship_requirement_content'); ?>
								                </div>
								                <div class="sc-content">
								                    <h4><?php echo get_sub_field('scholarship_undertaking_title'); ?></h4>
								                    <?php echo get_sub_field('scholarship_undertaking_content'); ?>
								                </div>
								            </div>
								            <div class="col-sm-1"></div>
								            <div class="col-sm-4">
								                <div class="sc-content">
								                    <h4><?php echo get_sub_field('application_deadline_title'); ?></h4>
								                    <?php echo get_sub_field('application_deadline_content'); ?>
								                </div>
								                <?php
								                if( have_rows('scholarship_forms') ):
								                    $m = 0;
								                    while ( have_rows('scholarship_forms') ) : the_row();
								                        ?>
								                        <div class="sc-content">
								                            <h4><?php echo get_sub_field('form_title'); ?></h4>
        								                    <?php
        								                    if( have_rows('form') ):
        								                    	$k = 0;
        								                    	?>
        								                    	<ul class="nav nav-tabs form-tab">
        									                    	<?php
        									                        while ( have_rows('form') ) : the_row();
        									                        	?>
        										                        <li class="<?php if($k == 0){ echo 'active'; }else{ echo ''; } ?>">
        										                        	<a data-toggle="tab" href="#<?php echo str_replace(' ', '_', get_sub_field('form_language')).'_'.$j.$k.$m; ?>"><?php echo get_sub_field('form_language'); ?></a>
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
        			                    	                    if( have_rows('form') ):
        			                    	                    	$l = 0;
        			                    	                    	?>
        			                    	                    		<?php
        			                    		                        while ( have_rows('form') ) : the_row();
        			                    		                        	?>
        											                        <div id="<?php echo str_replace(' ', '_', get_sub_field('form_language')).'_'.$j.$l.$m; ?>" class="tab-pane fade <?php if($l == 0){ echo 'in active'; }else{ echo ''; } ?>">
        											                            <div class="form-link">
        											                                <a href="<?php echo get_sub_field('form_button_link'); ?>"><?php echo get_sub_field('form_button_text'); ?> </a>
        											                            </div>
        											                        </div>
        			                    		                        	<?php
        			                    		                        	$l++;
        			                    		                        endwhile;
        			                    		                        ?>
        			                    	                        <?php
        			                    	                    endif;
        			                    	                    ?>
        								                    </div>
        								                </div>
								                        <?php
								                        $m++;
								                    endwhile;
								                endif;
								                ?>
								            </div>
								            <div class="col-sm-2"></div>
								        </div>
								    </div>
									<?php
									$j++;
							    endwhile;
							endif;
							?>
						</div>
					</div>
				</div>
				<?php
			endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
