<?php 

get_header();
show_admin_bar( false );

while (have_posts()):
	the_post();

	if ( isset( $_POST['submit_request'] ) ) {

		 $inputname = $_POST['inputname']; 
     $phonenumber =$_POST['phonenumber'];
     $inputemail=$_POST['inputEmail'];
     $guest_gender= $_POST['request_gender'];
     
	}
$post_id = wp_insert_post(array (
   'post_type' => 'request_guest',
   'post_title' => $inputname,
   'post_content' => $phonenumber,
   'post_status' => 'publish',
   'comment_status' => 'closed',   // if you prefer
   'ping_status' => 'closed',      // if you prefer
));

?>
<div id="bg">

	<div class="container" >
       <diV class="row">
       	<diV class="col-lg-12"><center>
       		<h1 class="entry-title"><?php echo get_the_title(); ?></h1></center><br>
			<center>
				<h2><?php echo $inputname?></h2>
			</center>
		</diV>
	</div>

</div>	
		

<?php
endwhile;
get_footer();
?>