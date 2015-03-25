<?php
//Adds thumbnail to post
add_theme_support('post-thumbnails');

//Adds menus
add_theme_support('menus');

//Register right-side bar
register_sidebar(array(
	'name' => _('Right Hand Sidebar'),
	'id' => 'right-sidebar',
	'description' => _('Widgets in this area will be  shown on  the right-hand side.'),
	'before_title' => '<h4>',
	'after_title' => '</h4>',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div><!-- widget end -->'
));
?>