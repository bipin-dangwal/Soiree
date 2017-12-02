<?php
get_header();

show_admin_bar( false );
if(have_posts()) : while(have_posts()) : the_post();
?>	


<diV class="col-lg-4">
	<div class="container" >
       <diV class="row">
       	 
			<h1 class="entry-title">
		      <a href="<?php permalink_link() ?>"> <?php the_title(); ?></a>
		    </h1>
			  <h4 class="entry-content"> 	
			   <?php the_content(); ?>
			  </h4>
				<h3> 
				<?php the_meta(); ?>
			   </h3>
			   
	   </diV>
    </div>
</div>
  <?php
endwhile; endif;
get_footer();
?>