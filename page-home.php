<?php
/**
 Template Name: Home Page
 *
 * The Template for the Home Page
 *
 * @package blackandwhite
 */

get_header(); ?>

    <!-- Beginning of Featured Slides -->
    <div class="slider">
    	<ul class="bxslider">
    	
			<?php
			global $post; 
			$args = array( 'post_type' => 'post', 'posts_per_page' => 3, 'meta_key' => '_bw_primary_checkbox' ); 
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :	setup_postdata($post); ?> 
                
 		 	<li> 
         		<div class="slide-container">
         			<div class="slide-title-wrap">
                        <div class="grid">
         					<div class="slide-title-container col-5-12">
         					
                            	<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
            					<p><?php $content = get_the_content(); echo wp_trim_words( $content , '16' ); ?></p>
            					<a href="<?php the_permalink(); ?>" class="featured-link"><?php echo get_theme_mod( 'blackandwhite_button_text' ); ?></a>
            			
                        	</div><!-- slide-title-container --> 
            			</div><!-- grid -->
                    </div><!-- slide-title-wrap -->   
		 		<?php the_post_thumbnail('large', array('class' => 'grayscale')) ?> 
         		</div><!-- slide-container -->   
         	</li>                 
		
		<?php endforeach; // end featured slider ?> 
     	
        <!-- End of Featured Slides -->
  		</ul><!-- bxslider -->
	</div><!-- slider -->
    <!-- End of Featured Slides -->  
   
    <div id="primary" class="content-area"> 
    
    <?php if( get_theme_mod( 'active_featured_stories' ) == '') : ?> 
     
		<main id="main" class="site-main grid stories" role="main">

        	<div class="col-1-1">
        		<?php if ( get_theme_mod( 'blackandwhite_featured_title' ) ) : ?>
        			<h1 class="featured-title"><?php echo get_theme_mod( 'blackandwhite_featured_title' ); // change the title ?></h1>
            	<?php endif; ?> 
        	</div><!-- col-1-1 -->
             
			<!-- Beginning of Featured Stories --> 
        	<div class="featured-stories">
			
				<?php
				global $post;
				$args = array( 'post_type' => 'post', 'posts_per_page' => 2, 'meta_key' => '_bw_secondary_checkbox'  );
				$myposts = get_posts( $args );
				foreach( $myposts as $post ) :	setup_postdata($post); ?>
				
            	<div class="featured-container">
                	<div class="featured-info featured-container"> 
                    	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
               			<p><?php $content = get_the_content(); echo wp_trim_words( $content , '15' ); ?></p>
                	
                    	<a class="read-up" href="<?php the_permalink(); ?>">
                    		<?php if ( get_theme_mod( 'blackandwhite_button_text' ) ) : ?>
								<?php echo get_theme_mod( 'blackandwhite_button_text' ); // change the text ?>
                    		<?php endif; ?>
                    	</a>   
                	</div><!-- featured-info --> 
                    
                	<div class="featured-image featured-container">
                		<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('featured-square', array('class' => 'featured-thumb grayscale')); // featured-square thumbnail ?>
                    	</a> 
                	</div><!-- featured-image -->
            	</div><!-- featured-container --> 
				<?php endforeach; // end featured stories ?>
        
        	</div><!-- featured-stories --> 
        	<!-- End of Featured Stories -->

		</main><!-- #main -->
        
    <?php else : ?>  
	<?php endif; ?>
	<?php // end if ?>  
           
	</div><!-- #primary -->

    <div id="secondary" class="content-area">
		<main id="main" class="site-main grid" role="main">
        	
			<?php if ( get_theme_mod( 'blackandwhite_editorial_title' ) ) : ?>
            	<h1 class="featured-black">    
					<?php echo get_theme_mod( 'blackandwhite_editorial_title' ); // change the title ?>
            	</h1>  
            <?php endif; ?>
           
				<!-- Beginning of Featured Stories -->
                <div id="freshly-pressed">
				
				<?php
				global $post;
				$args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
				$myposts = get_posts( $args );
				foreach( $myposts as $post ) :	setup_postdata($post); ?>
				            
                <div class="press">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', array('class' => 'featured-thumb grayscale')); ?></a>
                	
                    <div class="press-info">
    					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                		<p><?php the_date(); ?></p>
                	</div><!-- press-info --> 
                
                </div><!-- press --> 
				<?php endforeach; ?> 
                </div><!-- Freshly Pressed -->   
                <!-- End of Featured Stories -->

		</main><!-- #main -->
	</div><!-- #secondary -->
    
	<div class="grid more-stories">
		<div class="col-1-1">    	
            <span class="plus">  
            	<a href="<?php if( get_option( 'show_on_front' ) == 'page' ) echo get_permalink( get_option('page_for_posts' ) );
				else echo esc_url( home_url() ) ;?>">+</a> 
			</span><!-- plus -->  
        </div><!-- col-1-1 --> 
	</div><!-- more-stories --> 
    
    
<?php get_footer(); ?>