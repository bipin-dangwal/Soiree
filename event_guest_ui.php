 <?php wp_head(); 
 ?>


    <h2>Select event</h2>
   <form  method="POST"> 
   		<fieldset>
   			<p> 
			    <select id = "mylist" name="mylist">
			            <option >Choose one</option>
			        <!-- <option><?php //echo $_GET['event'] ?></option> -->
			     <?php
			      $the_posts = get_posts(array(
			        'post_type' => 'events',
			        'posts_per_page' => -1,
			      ));

			      foreach ($the_posts as $post) {
			        $post_id = $post->ID;
			        $post_title = $post->post_title;
			        echo "<option value='$post_id'>$post_title</option>";
			      }
			      

			   
			    ?>
			      </select>
			        <br>
			              <input type='submit' class="btn btn-primary text-center">
			</p>	
		</fieldset>	  


    <div class="container">
        <h2>Guest list</h2>
                 
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Guest name</th>
                    <th>Guest email</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                global $wpdb; 
                $postid = $_POST['mylist'];
                // var_dump($postid);die();
                $rows = $wpdb->get_results( "SELECT * FROM event_guest_list WHERE event_id=$postid");
                foreach ( $rows as $row ) {
                echo  '<tr>
                    <td>'.get_the_title($row->guest_id).'</td>
                    <td>'.get_post($row->guest_id)->save_guest_email.'</td>
                    <td>'.$row->status.'</td>
                    </tr>';
                }
              ?>
             
            </tbody>
        </table>
    </div>
     </form> 

 <?php  wp_footer(); ?>