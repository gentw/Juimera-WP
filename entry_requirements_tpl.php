<?php /* Template Name: Entry Requirements */ ?>
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
					if( have_rows('graduation') ):
						?>
						<ul class="nav nav-tabs main-text-tab">
							<?php
							$i = 0;
						 	while ( have_rows('graduation') ) : the_row();
						        ?>
						        <li class="<?php if($i == 0){ echo 'active'; } ?>">
						        	<a data-toggle="tab" href="#<?php echo 'graduation_'.$i; ?>"><?php echo get_sub_field('title'); ?></a>
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
						if( have_rows('graduation') ):
							$j = 0;
						 	while ( have_rows('graduation') ) : the_row();
						 		if($j == 0){ $active = 'in active'; }else{ $active = ''; }
						        ?>
							    <div id="<?php echo 'graduation_'.$j; ?>" class="tab-pane fade <?php echo $active; ?>">
							        <div class="graduate-header">
							            <div class="row">
							                <div class="col-sm-6">
						            			<?php if(get_sub_field('full_title')){ ?>
							                    	<h3><?php echo get_sub_field('full_title'); ?></h3>
							            		<?php }?>
							                </div>
					                		<div class="col-sm-6">
									            <?php    
							                	if( have_rows('program_languages') ):
							                		?>
								                		<ul class="nav nav-tabs programs">
								                			<?php
								                			$k = 0;
								                		 	while ( have_rows('program_languages') ) : the_row();
								                		 		if($k == 0){ $active_lng = 'active'; }else{ $active_lng = ''; }
								                		        ?>
								                        		<li class="<?php echo $active_lng; ?>">
								                        			<a data-toggle="tab" href="#<?php echo 'language_'.$j.$k; ?>"><?php echo get_sub_field('language_title'); ?></a>
								                        		</li>
								                		        <?php
								                		        $k++;
								                		    endwhile;
								                		    ?>
								                		</ul>
							                	    <?php
							                	endif;
							                	?>
					                		</div>
							            </div>
							        </div>
							        <div class="tab-content">
						        		<?php
						        		if( have_rows('program_languages') ):
					        				$l = 0;
					        			 	while ( have_rows('program_languages') ) : the_row();
					        			 		if($l == 0){ $active_lng = 'in active'; }else{ $active_lng = ''; }
					        			        ?>
					        	        		<div id="<?php echo 'language_'.$j.$l; ?>" class="tab-pane fade <?php echo $active_lng; ?>">
					        	        			<?php
								                	if( have_rows('graduation_requirements') ):
								                		?>
								                		<ul class="nav nav-tabs inner-tab">
								                			<?php
								                			$m = 0;
								                		 	while ( have_rows('graduation_requirements') ) : the_row();
								                		 		if($m == 0){ $active_req = 'active'; }else{ $active_req = ''; }
								                		        ?>
								                      			<li class="<?php echo $active_req; ?>">
								                      				<a data-toggle="tab" href="#<?php echo 'cat_tab_'.$j.$l.$m; ?>"><?php echo get_sub_field('requirement_title'); ?> 
								                      				<?php if(get_sub_field('requirement_short_description')){ ?>
								                      					<span><?php echo get_sub_field('requirement_short_description'); ?></span>
								                      				<?php } ?>
								                      				</a>
								                      			</li>		
								                		        <?php
								                		        $m++;
								                		    endwhile;
								                		    ?>
								                		</ul>
								                	    <?php
								                	endif;
									                ?>
					        	        		    <div class="tab-content">
        		    	        	        			<?php
    		    					                	if( have_rows('graduation_requirements') ):
		    					                			$n = 0;
		    					                		 	while ( have_rows('graduation_requirements') ) : the_row();
		    					                		 		if($n == 0){ $active_con = 'in active'; }else{ $active_con = ''; }
	    					                		 			if(get_sub_field('requirement_content')){
    		    					                		        ?>		
								        	        		        <div id="<?php echo 'cat_tab_'.$j.$l.$n; ?>" class="tab-pane fade <?php echo $active_con; ?>">
								        	        		            <?php the_sub_field('requirement_content'); ?>
								        	        		        </div>
    		    					                		        <?php
    		    					                		    }
		    					                		        $n++;
		    					                		    endwhile;
    		    					                	endif;
        		    					                ?>
					        	        		    </div>
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