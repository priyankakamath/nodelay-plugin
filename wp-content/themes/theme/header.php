<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php bloginfo('title'); ?></title>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<?php wp_head(); ?>


<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>

<script type="text/javascript" src="js/custom.js"></script>

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

</head>
<body>
<div id="container">

    <header> 
  <div class="width">

        <h1><a href="/"><strong><?php bloginfo('name'); ?></strong></a></h1>

    <nav>
      <?php wp_nav_menu(array('menu'=>'Main Menu')); ?>
    </nav>
        </div>

  <div class="clear"></div>

       
    </header>


    <div id="intro">

  <div class="width">
      
    <div class="intro-content">
  
                    <h2><?php bloginfo('description'); ?></h2>
                    
                                    
      <p><a href="<?php the_permalink(); ?>" class="button button-slider"><i class="fa fa-gbp"></i>Read More</a>
              <a href="<?php comments_link(); ?>" class="button button-reversed button-slider"><i class="fa fa-info"></i><?php comments_number('0 Comments','1 Comment','% responses'); ?></a></p>
                    

              </div>
                
            </div>
            

  </div>

    <div id="body" class="width">



    <section id="content" class="two-column with-right-sidebar">
