<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sparkling
 */
?>
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .site-content -->

	<div id="footer-area">
		<div class="container footer-inner">
			<div class="row">
				<?php get_sidebar( 'footer' ); ?>
			</div>
		</div>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info container">
				<div class="row">
					<?php
					if ( of_get_option( 'footer_social' ) ) {
						sparkling_social_icons();}
?>
					<div class="copyright col-md-12">
						<?php echo of_get_option( 'custom_footer_text', 'sparkling' ); ?>
					</div>
				</div>
			</div><!-- .site-info -->
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		</footer><!-- #colophon -->
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- <script src="<?php echo get_stylesheet_directory_uri();?>/js/scripts.js"></script> -->
<script type="text/javascript">
	// Loader Js 
	jQuery(window).load(function() {
	    jQuery(".loader").fadeOut('slow');
	    jQuery('body').removeClass('loading');
	});
</script>
</body>
</html>
