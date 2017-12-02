<!-- <?php

// echo'hello world <br>';

// $args = array( 'post_type' => 'Event', 'posts_per_page' => 10 );
// $loop = new WP_Query( $args );


// while ( $loop->have_posts() ) : $loop->the_post();
//   the_title();
//   echo '<div class="entry-content">';
//   the_content();
//   echo '</div>';
// endwhile;

?> -->


<?php 
get_header(); ?>
 
 

 <div id="bg">
			<div class="container" id="soireecarousel">
				<div class="jumbotron">
					<div class="col-lg-13">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
					    <!-- Indicators -->
						    <!-- <ol class="carousel-indicators">
						      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						      <li data-target="#myCarousel" data-slide-to="1"></li>
						      <li data-target="#myCarousel" data-slide-to="2"></li>
						    </ol> -->

						    <!-- Wrapper for slides -->
						    <div class="carousel-inner">

						      <div class="item active">
						        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/soiree1.jpg" alt="Soiree 1" style="width:100%;">
						        <!-- <div class="carousel-caption">
						          <h3>Los Angeles</h3>
						          <p>LA is always so much fun!</p>
						        </div> -->
						      </div>

						      <div class="item">
						        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/soiree2.jpg" alt="Soiree 2" style="width:100%;">
						        <!-- <div class="carousel-caption">
						          <h3>Chicago</h3>
						          <p>Thank you, Chicago!</p>
						        </div> -->
						      </div>
						    
						      <div class="item">
						        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/soiree9.jpg" alt="soiree 9" style="width:100%;">
						       <!--  <div class="carousel-caption">
						          <h3>New York</h3>
						          <p>We love the Big Apple!</p>
						        </div> -->
						      </div>
						  
						    </div>

						    <!-- Left and right controls -->
						    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
						      <span class="glyphicon glyphicon-chevron-left"></span>
						      <span class="sr-only">Previous</span>
						    </a>
						    <a class="right carousel-control" href="#myCarousel" data-slide="next">
						      <span class="glyphicon glyphicon-chevron-right"></span>
						      <span class="sr-only">Next</span>
						    </a>
					  </div>
					</div>
				</div>
					

					  
			</div>

		
       <div class="scroll-down"></div>

		
 </div>
 <div></div>

		 <div>
		  <section id="aboutus">  <!-- Start why us top -->
		      <div class="row">        
		        <div class="col-lg-12 col-sm-12">
		          <div class="whyus_top">
		            <div class="container">
		              <!-- Why us top titile -->
		              <div class="row">
		                <div class="col-lg-12 col-md-12"> 
		                  <div class="title_area">
		                    <h2 class="title_two">About Soiree</h2>
		                    <span></span> 
		                  </div>
		                </div>
		              </div>
		              <!-- End Why us top titile -->
		              <!-- Start Why us top content  -->
		              <div class="row">
		                <div class="col-lg-12 col-md-12 col-sm-12">
		                  <div class="single_whyus_top wow fadeInUp">
		                    <h8>ColoredCow celebrates every first Saturday of the month with family and friends. This custom has been started to take a little time off from work and enjoy some moments in life. we believe in sharing moments and learning with each other. Come and join us over music, food, drinks and some moments full of laughter and joy.</h8><br> <br>
		                  </div>

		                </div>        
		                 <center><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#eventModal">Request Invite</button></center> 
		              <!-- End Why us top content  -->
		            </div>
		          </div>
		         </div>        
		        </div> 
		     </div>

		   </section> 
		 </div>  

<div id="eventModal" class="modal fade" role="dialog">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="request_form">
      		<p id="msg"></p>
		        <div class="form-group">
		          <label for="inputname" class="col-sm-2 control-label">Name</label>
		          <div class="col-sm-10">
		            <input type="text" class="form-control" id="inputname" name="inputname" placeholder="Name" required>
		            <br>
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail" class="col-sm-2 control-label">Email</label>
		          <div class="col-sm-10">
		            <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" required>
		            <br>
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="phonenumber" class="col-sm-2 control-label">Phone number</label>
		          <div class="col-sm-10">
		            <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="phonenumber" required><br>
		          </div>
		        </div>
		           <div class="form-group">
		          <label for="request_gender" class="col-sm-2 control-label">Gender</label>
		          <label class="custom-control custom-radio">
		              <input name="request_gender" value="Male" type="radio" class="custom-control-input" required>
		              <span class="custom-control-indicator"></span>
		              <span class="custom-control-description">Male</span>&nbsp&nbsp&nbsp
		          </label>
		          <label class="custom-control custom-radio">
		              <input name="request_gender" value="Female" type="radio" class="custom-control-input" required>
		              <span class="custom-control-indicator"></span>
		              <span class="custom-control-description">Female</span>
		          </label>
		        </div>
      	
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="button" class="btn btn-primary" id="submit_request" name="submit_request">Request</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?
get_footer();
?>