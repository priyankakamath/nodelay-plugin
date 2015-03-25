<?php  
    /* 
    Plugin Name: my-plugin
    Plugin URI: http://www.yourpluginurlhere.com/ 
    Version: 1.0 
    Author: Priyanka
    Description: simple plugin to update post-excerpts
    */ 
function hk_trim_content( $limit ) {  
  $content = explode( ' ', get_the_content(), $limit );  
    
  if ( count( $content ) >= $limit ) {  
    array_pop( $content );  
    $content = implode(" ",$content).'...';  
  } else {  
    $content = implode(" ",$content);  
  }   
    
  $content = preg_replace('/\[.+\]/','', $content);  
  $content = apply_filters('the_content', $content);   
  
  return $content;  
}  
?>  