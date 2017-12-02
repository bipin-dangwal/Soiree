<?php 

get_header();
show_admin_bar( false );

while (have_posts()):
	the_post();

?>

	<div class="container" >
       <diV class="row">
       	<diV class="col-lg-4">
       		<h1 class="entry-title"><?php echo get_the_title(); ?></h1>
			<h2 class="entry-content"><?php echo get_the_content(); ?></h2>
			<h3 class="entry-meta"> <?php the_meta(); ?></h3>
		</diV>
	</div>
</diV>		

<?php
endwhile;
get_footer();
?>