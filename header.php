  <html>
  <head>
    <title>Soiree</title>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
  <?php wp_head(); ?>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a href="<?php echo home_url(); ?>"><img id="logo"  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png"/>&nbsp</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar" >
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo home_url(); ?>">Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a data-toggle="modal" data-target="#eventModal" id="request"><span class="glyphicon glyphicon-user"></span> Request invitte</a></li>
            <li><a href="<?php echo get_post_type_archive_link( 'events' ); ?>"><span class="glyphicon glyphicon-calendar"></span> Events</a></li>
            <li><a href="<?php echo admin_url(); ?>
"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
  
