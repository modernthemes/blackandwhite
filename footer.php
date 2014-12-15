<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package blackandwhite
 */
?>

	</section><!-- #content --> 

	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="grid grid-pad">
        	
            <div class="col-footer-left">
            	<?php if ( get_theme_mod( 'blackandwhite_footer_name' ) ) : ?>
                	<h2><?php echo get_theme_mod( 'blackandwhite_footer_name' ); // change the footer name ?></h2>
				<?php endif; ?>
        		<?php if ( get_theme_mod( 'blackandwhite_footer_slogan' ) ) : ?>
                	<p><?php echo get_theme_mod( 'blackandwhite_footer_slogan' ); // change the footer slogan ?></p>
				<?php endif; ?>
        		<div class="footer-socials"><?php echo blackandwhite_media_icons(); ?></div>
            </div><!-- .col-footer-left -->
            
            <?php if ( is_active_sidebar('footer-2') ) : ?>
        		<div class="col-footer-third">
					<?php dynamic_sidebar( 'footer-2' ); // footer widget 2 ?> 
            	</div><!-- .col-footer-third -->
            <?php endif; ?>
            
            <?php if ( is_active_sidebar('footer-3') ) : ?> 
        		<div class="col-footer-third">
					<?php dynamic_sidebar( 'footer-3' ); // footer widget 3 ?>
            	</div><!-- .col-footer-third -->
            <?php endif; ?>
            
            <?php if ( is_active_sidebar('footer-4') ) : ?> 
        		<div class="col-footer-third">
					<?php dynamic_sidebar( 'footer-4' ); // footer widget 4 ?>
            	</div><!-- .col-footer-third --> 
            <?php endif; ?> 
        
        </div><!-- .grid -->
    
    	<div class="grid grid-pad">
			<div class="site-info col-1-1">
				
			<?php if ( get_theme_mod( 'blackandwhite_footerid' ) ) : ?> 
        		<?php echo get_theme_mod( 'blackandwhite_footerid' ); ?>  
			<?php else : ?>  
    			<?php	printf( __( 'Theme: %1$s by %2$s', 'blackandwhite' ), 'blackandwhite', '<a href="http://modernthemes.net" rel="designer">modernthemes.net</a>' ); ?>
			<?php endif; ?>  
			
            </div><!-- .site-info -->
        </div><!-- grid -->
        
	</footer><!-- #colophon -->  

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>